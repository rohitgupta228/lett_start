<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization, Content-Type');

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'user', 'middleware' => 'api'], function() {
    Route::post('signup', 'Api\AuthController@signup')->name('signup');

    Route::post('login', 'Api\AuthController@login')->name('login');

    Route::get('details', 'Api\AuthController@getUser')->name('api.user.details');

    Route::get('logout', 'Api\AuthController@logout')->name('api.user.logout');

    Route::post('profile/update', 'Api\AuthController@updateProfile')->name('api.user.profile.update');

    Route::post('upload/profile-image', 'Api\AuthController@uploadImage')->name('api.user.image.update');

    Route::post('forgot-password', 'Api\AuthController@forgotPassword')->name('api.user.fogot.password');

    Route::post('reset-password', 'Api\AuthController@resetPassword')->name('api.user.reset.password');

    Route::get('order-history', 'Api\AuthController@orderHistory')->name('api.user.order.history');

    Route::get('download-theme/{productId}/{userId}', 'Api\AuthController@downloadTheme')->name('api.user.download.theme');
});

Route::group(['prefix' => 'product', 'middleware' => ['auth:api', 'IsAdmin']], function() {
    Route::post('create', 'Api\ProductController@create')->name('product.create');

    Route::put('update', 'Api\ProductController@update')->name('product.update');

    Route::get('edit/{productId}', 'Api\ProductController@edit')->name('product.edit');

    Route::delete('delete', 'Api\ProductController@delete')->name('product.delete');

    Route::get('bulk-upload', 'Api\ProductController@bulkUpload')->name('product.bulk.upload');

    Route::get('lists', 'Api\ProductController@productsList')->name('product.lists');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:api', 'IsAdmin']], function() {
    Route::get('get-affiliate-users', 'Api\AdminController@getAffiliateUsers')->name('admin.affiliate.users');

    Route::post('update-affiliate-status', 'Api\AdminController@updateAffiliateStatus')->name('admin.affiliate.status');
    
    Route::post('save-coupan', 'Api\AdminController@saveCoupan')->name('admin.save.coupan');

    Route::put('update-coupan', 'Api\AdminController@updateCoupan')->name('admin.update.coupan');

    Route::delete('delete-coupan', 'Api\AdminController@deleteCoupan')->name('admin.delete.coupan');
});

Route::group(['middleware' => 'api'], function() {
    Route::get('get-coupans', 'Api\AdminController@getAllCoupans')->name('admin.coupans');

    Route::post('validate-coupan', 'Api\PaymentController@validateCoupan')->name('validate.coupan');
});

Route::group(['prefix' => 'payment', 'middleware' => 'api'], function() {

    //    Route::post('stripe', 'Api\PaymentController@submitPayment')->name('payment.stripe');

    Route::post('paypal', 'Api\PaymentController@postPaymentWithpaypal')->name('payment.paypal');

    Route::post('paypal-response', 'Api\PaymentController@savePaypalResponse')->name('payment.paypal.response');

    Route::post('free', 'Api\PaymentController@save')->name('payment.free');
});

Route::group(['prefix' => 'razorpay'], function() {

    Route::post('order/create', 'Api\PaymentController@orderCreate')->name('product.order.create');

    Route::post('order/verify', 'Api\PaymentController@verifySignature')->name('product.order.verify');
});

Route::get('download-theme', 'Api\PaymentController@downloadTheme')->name('download.theme');
