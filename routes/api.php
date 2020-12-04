<?php

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


Route::group(['prefix' => 'user','middleware' => 'api'], function() {
    Route::post('signup', 'Api\AuthController@signup')->name('signup');
    
    Route::post('login', 'Api\AuthController@login')->name('login');
    
    Route::get('details', 'Api\AuthController@getUser')->name('api.user.details');
    
    Route::get('logout', 'Api\AuthController@logout')->name('api.user.logout');
    
    Route::post('profile/update', 'Api\AuthController@updateProfile')->name('api.user.profile.update');
    
    Route::post('upload/profile-image', 'Api\AuthController@uploadImage')->name('api.user.image.update');
    
    Route::post('forgot-password', 'Api\AuthController@forgotPassword')->name('api.user.fogot.password');
    
    Route::post('reset-password', 'Api\AuthController@resetPassword')->name('api.user.reset.password');
});

Route::group(['prefix' => 'product','middleware' => 'api'], function() {
    Route::post('create', 'Api\ProductController@create')->name('product.create');
    
    Route::put('update', 'Api\ProductController@update')->name('product.update');
    
    Route::delete('delete', 'Api\ProductController@delete')->name('product.delete');
    
    Route::get('details/{productId}', 'Api\ProductController@details')->name('product.details');
    
    Route::get('lists', 'Api\ProductController@lists')->name('product.lists');
});

Route::group(['prefix' => 'transaction','middleware' => 'api'], function() {
    Route::post('save', 'Api\PaymentController@save')->name('transaction.save');
});

Route::get('download-theme', 'Api\PaymentController@downloadTheme')->name('download.theme');