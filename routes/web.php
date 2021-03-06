<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::middleware('isLogin')->group(function () {
    Route::get('/edit-profile', 'UserController@editProfile')->name('user.edit.profile');
    
    Route::post('/save-profile-data', 'UserController@saveProfile')->name('save.profile');
    
    Route::post('/save-user-image', 'UserController@updateProfileImage')->name('save.user.image');
    
    Route::get('/order-history', 'ProductController@orderHistory')->name('user.order.history');
    
    Route::post('/rating', 'ProductController@rating')->name('product.rating');
});

Route::get('/', 'ProductController@homeProductsList')->name('home.products.list');

Route::get('/category/{category?}', 'ProductController@lists')->name('product.category');

Route::get('/category/landing-pages-templates/{category?}', 'ProductController@lists')->name('product.landing.app');

Route::get('/search-result/{s?}', 'ProductController@search')->name('products.search');

Route::get('/theme/{detailLink?}', 'ProductController@details')->name('product.theme');

Route::get('/support', 'PagesController@support')->name('support');

Route::post('/submit-support', 'PagesController@submitSupport')->name('submit.support');

Route::get('/terms-and-conditions', 'PagesController@terms')->name('terms-and-conditions');

Route::get('/affiliate', 'PagesController@affiliate')->name('affiliate');

Route::get('/about-us', 'PagesController@aboutUs')->name('about-us');

Route::post('/submit-affiliate', 'PagesController@submitAffiliate')->name('submit.affiliate');

Route::get('/privacy-policy', 'PagesController@privacyPolicy')->name('privacy-policy');

Route::get('/contact-us', 'PagesController@contactUs')->name('contact-us');

Route::post('/submit-contact-us', 'PagesController@submitContactUs')->name('submit.contact.us');

Route::get('/faq', 'PagesController@faq')->name('faq');

Route::get('/license', 'PagesController@license')->name('license');

Route::get('/paypal-response', 'PaypalController@savePaypalResponse')->name('paypal.response');


Auth::routes([
    'register' => false,
    'login' => false,
]);

//Route::get('/home', 'HomeController@index')->name('home');
