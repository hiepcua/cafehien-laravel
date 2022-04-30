<?php

use Illuminate\Support\Facades\Route;

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


/* Route::get('/', function () {
    return view('index.index');    
});*/
Route::group(['namespace' => 'FE'], function () {

    Route::get('/', 'HomeController@index')->name('home.index');
    
    Route::get('/bai-viet/{slug}.html', 'PostsController@detail');
    Route::post('/bai-viet/{slug}.html', 'PostsController@detail');
    Route::get('/bai-viet/{slug}.{id}', 'PostsController@index');

    Route::get('/san-pham/{slug}.html', 'ProductsController@detail');
    Route::post('/san-pham/{slug}.html', 'ProductsController@detail');
    Route::get('/san-pham/{slug}.{id}', 'ProductsController@index');
    Route::post('/add-cart.html', 'ProductsController@addToCartNew');
    Route::post('/check-coupon-cart.html', 'ProductsController@checkCoupon');

    Route::get('/lien-he', 'ContactController@index');
    Route::post('/lien-he', 'ContactController@index');
    Route::get('/nha-phan-phoi',                  'AuthenticationController@login');
    Route::post('/nha-phan-phoi',                  'AuthenticationController@postLogin');
    Route::get('/dang-nhap',                  'AuthenticationController@login');
    Route::post('/dang-nhap',                  'AuthenticationController@postLogin');
    Route::get('/logout',                  'AuthenticationController@logout');
    Route::get('/ma-khuyen-mai.html', 'SalesController@index');
    Route::post('/ma-khuyen-mai.html', 'SalesController@index');


    
    // Route::get('/get-cart', 'ProductsController@getCart');
    // Route::get('/delete-cart/{id}', 'ProductsController@removeCart');

    // Route::get('/cart', 'CartsController@getCart');
    // Route::post('/cart', 'CartsController@getCart');

    // Route::get('/check-out', 'CartsController@checkOut');
    // Route::post('/check-out', 'CartsController@checkOut');

    
    // Route::get('/cart-remove-page/{id}', 'CartsController@removeCart');
    
});
Route::group(['namespace' => 'FE', 'middleware' => ['webAuth'],  'prefix' => 'thanh-vien'], function () {
    Route::get('/profile', 'UserController@profile');
    Route::post('/profile', 'UserController@profile');
    Route::get('/password', 'UserController@password');
    Route::post('/password', 'UserController@password');
    Route::get('/cart', 'UserController@cart');
    Route::get('/cart/{id}', 'UserController@cartDetail');
    Route::get('/notify', 'UserController@notify');
    Route::get('/address', 'UserController@address');
    Route::get('/list-address', 'UserController@listAddress');
    Route::get('/address/default/{id}', 'UserController@setDefault');
    Route::post('/address/update/{id}', 'UserController@updateAddress');
    
    Route::post('/update-status/{id}',    'UserController@updateStatus');
    Route::get('/thong-ke', 'UserController@dashboard');
    Route::post('/thong-ke', 'UserController@dashboard');

    
    
});




/* Dashboard */
