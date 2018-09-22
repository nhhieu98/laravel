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

Route::get('/', 'UploadController@index');

Route::get('detail/{slug}', 'UploadController@detail');

Route::post('addtocart', 'UploadController@addtocart');

Route::get('shop', 'UploadController@shop');

Route::get('cart', 'UploadController@cart');

Route::post('cart', 'UploadController@remove');

Route::post('order', 'UploadController@order');


Route::prefix('admin')->group(function () {
	Route::get('login', 'AdminAuth\LoginController@showLoginForm')->name('adminlogin');
    Route::post('login', 'AdminAuth\LoginController@login')->name('admin.login');
    Route::post('logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    // Registration Routes...
    Route::get('register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'AdminAuth\RegisterController@register')->name('admin.signin');

    // Password Reset Routes...
    // Route::get('password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    // Route::post('password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    // Route::get('password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('password.reset');
   	// Route::post('password/reset', 'AdminAuth\ResetPasswordController@reset');

   	Route::middleware('admin.auth')->group(function() {

   		Route::get('index', function() {
   			return view('admin.home');
   		});
   		
   		Route::get('products', 'ProductController@index');

   		Route::get('products/list', 'ProductController@getList')->name('products.list');

   		Route::post('products', 'ProductController@store')->name('products.store');

   		Route::delete('products/{id}', 'ProductController@destroy');
   		Route::delete('products/xoa/{id}', 'ProductController@destroy2');

   		Route::get('products/edit/{id}', 'ProductController@edit');

        Route::put('products/{id}', 'ProductController@update');

        Route::post('upload', 'ProductController@storeImage');

        Route::post('productDetail/{id}', 'ProductController@storeDetail');
        Route::post('productDetail/detail/{id}', 'ProductController@storeDetail2');

        Route::post('products/show/{id}', 'ProductController@show');

   	});
});

Auth::routes();

Route::middleware('admin.auth')->group(function() {
	Route::get('home', 'HomeController@index')->name('home');
});
