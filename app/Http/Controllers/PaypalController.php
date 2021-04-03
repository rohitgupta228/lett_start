<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\ProductDownload;
use Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\UrlGenerator;
use Carbon\Carbon;
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

class PaypalController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'], $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    /**
     * Function to save paypal response
     *
     * @param Request $request
     * @return type
     */
    public function savePaypalResponse(Request $request)
    {
        $data = $request->all();
        $product = Product::where('productId', $data['product_id'])->first();
        try {
            $paymentStatus = config('settings.payment_status');
            $transaction = Transaction::where('product_id', $data['product_id'])->orderBy('id', 'desc')->first();
            $data['txn_id'] = $transaction->txn_id;
            $payment_id = $transaction->txn_id;
            if ($payment_id == $data['paymentId']) {
                $payment = Payment::get($payment_id, $this->_api_context);
                $execution = new PaymentExecution();
                $execution->setPayerId($data['PayerID']);
                logger($transaction);
                $result = $payment->execute($execution, $this->_api_context);
                if ($result->getState() == 'approved') {
                    logger($result->getState());
                    $this->sendEmailOnSuccess($data, $product);
                    $transaction->update(['payment_status' => $paymentStatus[0], 'response' => $result]);
                    $downloads = \App\Models\Download::where('product_id', $product->id)->first();
                    $downloads = $downloads ? $downloads->update(['num_downloads' => $downloads->num_downloads + 1]) : \App\Models\Download::create(['product_id' => $product->id, 'num_downloads' => 1]);
                    return redirect(route('product.theme', ['theme' => $product->detailLink, 'success' => "true"]));
                }
            }
        } catch (\Exception $exc) {
            logger($exc->getMessage());
            return redirect(route('product.theme', ['theme' => $product->detailLink, 'success' => "false"]));
        }
    }

    public function sendEmailOnSuccess($data, $product)
    {
        logger($data);
        $user = Auth::user();
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

}
