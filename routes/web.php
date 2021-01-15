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
Route::get('/', 'ProductController@homeProductsList')->name('home.products.list');

Route::get('/products/{category?}', 'ProductController@lists')->name('product.category');

Route::get('/search-result.html/{s?}', 'ProductController@search')->name('products.search');

Route::get('/support', 'UserController@support')->name('support');

