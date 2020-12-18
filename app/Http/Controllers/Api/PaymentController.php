<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\ProductDownload;
use Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Stripe;
/** All Paypal Details class * */
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction as PaypalTransaction;
use Session;
use Redirect;
use Input;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{

    const PAYMENT_STATUS = [
        "SUCCESS",
        "FAILURE"
    ];

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
        $this->middleware('auth:api', ['except' => ['downloadTheme']]);

        /** PayPal api context * */
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'], $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    /**
     * Function to save payment by stripe
     *
     * @param Request $request
     * @return type
     */
    public function submitPayment(Request $request)
    {
        $this->setApikey();
        $data = $request->request->all();
        $product = \App\Models\Product::where('productId', $data['product_id'])->first();
        $productName = '';
        try {
            if ($product && $product->price > 0) {
                $amount = $product->price * 100;
                $stripe = \Stripe\Token::create([
                            'card' => [
                                'number' => $data['card_num'],
                                'exp_month' => $data['exp_month'],
                                'exp_year' => $data['exp_year'],
                                'cvc' => $data['cvv'],
                            ],
                ]);
                $customer = \Stripe\Customer::create(array(
                            'name' => 'test',
                            'description' => 'test description',
                            'email' => 'rohit@gmail.com',
                            'source' => $stripe->id,
                            'address' => [
                                'line1' => 'test',
                                'postal_code' => '12345',
                                'city' => 'test',
                                'state' => 'test',
                                'country' => 'US',
                            ],
                ));

                $payment = \Stripe\Charge::create([
                            "amount" => $amount,
                            "currency" => 'USD',
                            'customer' => $customer->id,
                            "description" => "Test payment from itsolutionstuff.com."
                ]);
                if ($payment->status == 'succeeded') {
                    $data['txn_id'] = $payment->id;
                    $data['order_id'] = $payment->id;
                    $data['response'] = json_encode($payment);
                    $data['product'] = $product;
                    $data['type'] = 2;
                    $this->actionsAfterPayment($data);
                    $productName = $product->name;
                    $response = [
                        'code' => 200,
                        'message' => 'Payment done successfully',
                        'product_name' => $productName
                    ];
                }
            } else {
                $response = [
                    'code' => 404,
                    'message' => 'No product found',
                ];
            }
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'message' => $exc->getMessage(),
            ];
        }
        return response()->json($response);
    }

    /**
     * Function to submit paypal request
     *
     * @param Request $request
     * @return type
     */
    public function postPaymentWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $amountPaid = 1;
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name * */
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($amountPaid);/** unit price * */
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency("USD")
                ->setTotal($amountPaid);
        $transaction = new PaypalTransaction();
        $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl("http://localhost:4200/#/paypal-response/" . 1)->setCancelUrl("http://localhost:4200/#/paypal-response/" . 1);
        $payment = new Payment();
        $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session * */
        Session::put('paypal_payment_id', $payment->getId());
        print_r($redirect_url);
        die;
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }

    /**
     * Function to save paypal response
     *
     * @param Request $request
     * @return type
     */
    public function savePaypalResponse(Request $request)
    {
        $paymentStatus = config('settings.payment_status');
        $transaction = Transaction::where('order_id', $request->order_id)->orderBy('id', 'desc')->first();
        $payment_id = $transaction->txn_id;
        if ($payment_id == $request->payment_id) {
            $payment = Payment::get($payment_id, $this->_api_context);
            $execution = new PaymentExecution();
            $execution->setPayerId($request->payer_id);
            $result = $payment->execute($execution, $this->_api_context);
            if ($result->getState() == 'approved') {
                $request->amount = $transaction->amount;
                $this->actionsAfterPayment($request);
                $transaction->update(['payment_status' => $paymentStatus[0], 'gateway_status' => $result->getState(), 'response' => $result]);
                return response(json_encode(['status' => true]));
            }
        }
        return response(['status' => false]);
    }

    /**
     * Function to set stripe api key
     */
    private function setApikey()
    {
        Stripe\Stripe::setApiKey(env('STRIPE_S'));
    }

    /**
     * Create Product
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request)
    {
        try {
            $data = $request->request->all();
            $product = \App\Models\Product::find($data['product_id']);
            $paymentStatus = config('settings.payment_status');
            if ($product && $product->price == $data['amount']) {
                DB::beginTransaction();
                $paymentData = [
                    'user_id' => $data['user_id'],
                    'product_id' => $data['product_id'],
                    'payment_status' => $paymentStatus[1],
                    'payment_type' => 2,
                ];
                if ($data['success']) {
                    $paymentData['txn_id'] = $data['razorpay_response']['id'];
                    $paymentData['order_id'] = $data['razorpay_response']['order_id'];
                    $paymentData['response'] = json_encode($data['razorpay_response']);
                    $paymentData['payment_status'] = $paymentStatus[0];
                }
                $transaction = Transaction::create($paymentData);
                $this->sendEmailOnSuccess($product);
//                $this->sendEmailOnSuccess($data['product_id']);
                $response = [
                    'code' => 200,
                    'data' => [
                        'payment_details' => $transaction,
                    ],
                    'message' => 'Success'
                ];
                DB::commit();
            } else {
                $response = [
                    'code' => 400,
                    'message' => 'Bad Request'
                ];
            }
        } catch (\Exception $exc) {
            DB::rollBack();
            $response = [
                'code' => $exc->getCode(),
                'message' => $exc->getMessage()
            ];
        }

        return response()->json($response, 200);
    }

    public function actionsAfterPayment($data)
    {
        $paymentStatus = config('settings.payment_status');
        $user = $this->guard()->user();
        DB::beginTransaction();
        $paymentData = [
            'user_id' => $user->id,
            'product_id' => $data['product_id'],
            'payment_status' => $paymentStatus[0],
            'payment_type' => $data['type'],
            'txn_id' => $data['txn_id'],
            'order_id' => $data['order_id'],
            'response' => $data['response'],
        ];
        $transaction = Transaction::create($paymentData);
        $this->sendEmailOnSuccess($data['product']);
        $response = [
            'code' => 200,
            'data' => [
                'payment_details' => $transaction,
            ],
            'message' => 'Success'
        ];
        DB::commit();
    }

    public function sendEmailOnSuccess($product)
    {
        $user = $this->guard()->user();
        $email = Crypt::encryptString($user->email);
        $token = str_random(60);
        ProductDownload::create([
            'email' => $user->email,
            'product_id' => $product->id,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $data = [
            'username' => $user->name,
            'url' => $this->url->to('/') . '/api/download-theme?email=' . $email . '&productId=' . $product->productId . '&token=' . $token,
            'subject' => 'Download Theme',
            'template' => 'emails.product_download'
        ];
        Mail::to($user->email)->send(new \App\Mail\Mailer($data));
    }

    public function downloadTheme(Request $request)
    {
        try {
            $data = $request->all();
            $email = Crypt::decryptString($data['email']);
            $productId = Crypt::decryptString($data['productId']);
            $product = ProductDownload::where('token', $data['token'])
                    ->where('email', $email)
                    ->where('product_id', $productId)
                    ->first();
            if ($product) {
                $createdDate = $product->created_at;
                $dateAfter24Hours = Carbon::parse($product->created_at)->addHour(24)->toDateTimeString();
                if (Carbon::now()->toDateTimeString() < $dateAfter24Hours) {
                    $product->delete();
                    return response()->download(public_path() . '/uploads/' . $productId . '.zip');
                } else {
                    print_r('This url has been expired');
                    die;
                }
            }
            print_r('This url has been expired');
            die;
        } catch (\Exception $exc) {
            return Redirect::to('https://www.google.co.in/');
        }
    }

}
