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
use Razorpay\Api\Api;
use App\Models\Product;

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
     * Function to submit paypal request
     *
     * @param Request $request
     * @return type
     */
    public function postPaymentWithpaypal(Request $request)
    {
        try {
            $data = $request->all();
            $product = \App\Models\Product::where('productId', $data['product_id'])->first();
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
            $amountPaid = $amount = $data['multi'] ? $product->price * 5 : $product->price;
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
                    ->setDescription("Product Name: " . $product->name . " and Product Id: " . $product->id);
            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(env('BASE_URL') . 'paypal-response?product_id=' . $data['product_id'] . '&multi=' . $data['multi'])->setCancelUrl(env('BASE_URL') . 'theme/' . $product->detailLink . '?success=false');
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
            logger($redirect_url);
            if (isset($redirect_url)) {
                $paymentStatus = config('settings.payment_status');
                $user = \App\User::find($data['user_id']);
                $paymentData = [
                    'user_id' => $user->id,
                    'product_id' => $data['product_id'],
                    'payment_status' => $paymentStatus[2],
                    'payment_type' => 1,
                    'txn_id' => $payment->getId(),
                    'multi' => $data['multi'],
                    'amount' => $amountPaid,
                    'response' => null,
                ];
                $transaction = Transaction::create($paymentData);
                $response = [
                    'code' => 200,
                    'data' => [
                        'url' => $redirect_url,
                        'status' => true
                    ],
                ];
            }
        } catch (\Exception $exc) {
            logger($exc->getMessage());
            $response = [
                'code' => $exc->getCode(),
                'data' => [
                    'url' => '',
                    'status' => false
                ],
            ];
        }
        return response(json_encode($response));
    }

    public function save(Request $request)
    {
        $data = $request->all();
        $product = \App\Models\Product::where('productId', $data['product_id'])->first();
        $paymentStatus = config('settings.payment_status');
        try {
            if ($product->price == 0) {

                $transactionData = Transaction::where('product_id', $product->productId)->first();
                if ($transactionData) {
                    $response = [
                        'code' => 200,
                        'message' => 'Already downloaded',
                        'product_name' => $product->name,
                        'already_downloaded' => 1
                    ];
                    return $response;
                }

                $paymentData = [
                    'user_id' => $data['user_id'],
                    'product_id' => $data['product_id'],
                    'payment_status' => $paymentStatus[0],
                    'payment_type' => 2,
                    'txn_id' => null,
                    'response' => null,
                    'amount' => 0,
                    'multi' => false
                ];
                $transaction = Transaction::create($paymentData);
                $downloads = \App\Models\Download::where('product_id', $product->id)->first();
                $downloads = $downloads ? $downloads->update(['num_downloads' => $downloads->num_downloads + 1]) : \App\Models\Download::create(['product_id' => $product->id, 'num_downloads' => 1]);
                $response = [
                    'code' => 200,
                    'message' => 'Payment done successfully',
                    'product_name' => $product->name,
                    'already_downloaded' => 0
                ];
            } else {
                $response = [
                    'code' => 404,
                    'message' => 'Please choose payment method',
                    'already_downloaded' => 0
                ];
            }
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'message' => $exc->getMessage(),
                'already_downloaded' => 0
            ];
        }
        return response(json_encode($response));
    }

    public function orderCreate(Request $request)
    {
        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $data = $request->request->all();
            $product = \App\Models\Product::where('productId', $data['product_id'])->first();
            if ($product && $product->price > 0) {
                $amount = $data['multi'] ? $product->price * 100 * 5 : $product->price * 100;
                $order = $api->order->create(array(
                    'receipt' => 'rcptid_11',
                    'amount' => $amount,
                    'currency' => 'USD'
                        )
                );
                $response = [
                    'code' => 200,
                    'data' => [
                        'order_id' => $order->id
                    ],
                ];
                return response()->json($response);
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

    public function verifySignature(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $data = $request->request->all();
        $attributes = [
            'razorpay_signature' => $data['razorpay_signature'],
            'razorpay_payment_id' => $data['razorpay_payment_id'],
            'razorpay_order_id' => $data['razorpay_order_id']
        ];
        try {
            $api->utility->verifyPaymentSignature($attributes);
            $data['txn_id'] = $data['razorpay_payment_id'];
            $data['response'] = json_encode([
                'razorpay_signature' => $data['razorpay_signature'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_order_id' => $data['razorpay_order_id']
            ]);
            $product = \App\Models\Product::where('productId', $data['product_id'])->first();
            $data['product'] = $product;
            $data['payment_type'] = 3;
            $this->actionsAfterPayment($data);
            $response = [
                'code' => 200,
                'message' => 'Payment done successfully',
                'product_name' => $product->name
            ];
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'data' => [
                    'status' => false
                ]
            ];
        }
        return response()->json($response);
    }

    public function actionsAfterPayment($data)
    {
        $paymentStatus = config('settings.payment_status');
        $user = \App\User::find($data['user_id']);
        $data['user'] = $user;
        DB::beginTransaction();
        $paymentData = [
            'user_id' => $user->id,
            'product_id' => $data['product_id'],
            'payment_status' => $paymentStatus[0],
            'payment_type' => $data['payment_type'],
            'txn_id' => $data['txn_id'],
            'response' => $data['response'],
            'amount' => $data['multi'] ? $data['product']->price * 5 : $data['product']->price,
            'multi' => $data['multi']
        ];
        $transaction = Transaction::create($paymentData);
        $downloads = \App\Models\Download::where('product_id', $data['product']->id)->first();
        $downloads = $downloads ? $downloads->update(['num_downloads' => $downloads->num_downloads + 1]) : \App\Models\Download::create(['product_id' => $data['product']->id, 'num_downloads' => 1]);
        $this->sendEmailOnSuccess($data);
        DB::commit();
    }

    public function sendEmailOnSuccess($data)
    {
        $user = $data['user'];
        $product = $data['product'];
        $email = Crypt::encryptString($user->email);
        $token = str_random(60);
        ProductDownload::create([
            'email' => $user->email,
            'product_id' => $product->id,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $data = [
            'license' => $data['multi'] ? 'multiple' : 'single',
            'product_name' => $product->name,
            'price' => $data['multi'] ? $product->price * 5 : $product->price,
            'txnId' => $data['txn_id'],
            'url' => $this->url->to('/') . '/api/download-theme?email=' . $email . '&productId=' . $product->productId . '&token=' . $token,
            'subject' => 'Download Theme',
            'template' => 'emails.product_download'
        ];
        $address = env('MAIL_FROM_ADDRESS');
        $name = env('MAIL_FROM_NAME');
        Mail::to($user->email)->bcc($address, $name)->send(new \App\Mail\Mailer($data));
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
                
                if (Carbon::now()->toDateTimeString() > $dateAfter24Hours) {
                    $product->delete();
                    return Redirect::to(env('FRONT_END_BASE_URL') . '404.html');
                }
                $headers = array(
                    'Content-Type' => 'application/octet-stream',
                );
                $productDetails = Product::find($productId);
                return response()->download(public_path() . '/packages/' . $productDetails->packageName . '.zip', $productDetails->name . '.zip', $headers);
            }
        } catch (\Exception $exc) {
            logger($exc->getMessage());
        }
        return Redirect::to(env('FRONT_END_BASE_URL') . '404.html');
    }

}
