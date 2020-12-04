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
            if ($product && $product->price == $data['amount']) {
                DB::beginTransaction();
                $paymentData = [
                    'user_id' => $data['user_id'],
                    'product_id' => $data['product_id'],
                    'payment_status' => self::PAYMENT_STATUS[1],
                    'payment_type' => 2,
                ];
                if ($data['success']) {
                    $paymentData['txn_id'] = $data['razorpay_response']['id'];
                    $paymentData['order_id'] = $data['razorpay_response']['order_id'];
                    $paymentData['response'] = json_encode($data['razorpay_response']);
                    $paymentData['payment_status'] = self::PAYMENT_STATUS[0];
                }
                $transaction = Transaction::create($paymentData);
                $this->sendEmailOnSuccess($data['product_id']);
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

    public function sendEmailOnSuccess($productId)
    {
        $user = $this->guard()->user();
        $email = Crypt::encryptString($user->email);
        $encryptedProductId = Crypt::encryptString($productId);
        $token = str_random(60);
        ProductDownload::create([
            'email' => $user->email,
            'product_id' => $productId,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
       
        $data = [
            'username' => $user->name,
            'url' => $this->url->to('/') . '/api/download-theme?email=' . $email . '&productId=' . $encryptedProductId . '&token=' . $token,
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
                    return response()->download(public_path() . '/uploads/' . 'file-2020-10-24-09-01-35.png');
                } else {
                    print_r('This url has been expired');
                    die;
                }
            }
            print_r('This url has been expired');
            die;
        } catch (Exception $exc) {
            print_r('This url has been expired');
            die;
        }
    }

}
