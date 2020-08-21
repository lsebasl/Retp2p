<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

//DB::listen(function ($query){
    //var_dump($query->sql);
//});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes(["verify" => true]);

Route::get('/verify', function () {
    return view('auth.verify');
});

Route::get('/home-store','Store\HomeController@index')->name('home.store');

Route::middleware(['auth','user.status','verified'])->group(function () {

//project routes

    Route::get('/about', 'Store\AboutController@index')->name('store.about');
    Route::get('/profile', 'Store\ProfileController@index')->name('store.profile');
    Route::get('/cart/add','Store\CartController@add')->name('cart.add');
    Route::get('/cart/show', 'Store\CartController@show')->name('cart.show');
    Route::put('/cart/update', 'Store\Cart\Controller@update')->name('cart.update');
    Route::delete('/cart/delete/{item}', 'Store\CartController@destroy')->name('cart.destroy');

    Route::get('/goods', 'Store\GoodsController@index')->name('goods.index');
    Route::get('/goods/category/{category}', 'Store\GoodsController@category')->name('goods.category');
    Route::get('/goods/show/{show}', 'Store\GoodsController@show')->name('goods.show');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/users/store', 'UserController@store')->name('users.store');
    Route::put('/users/{user}', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::get('/users/{user}/show', 'UserController@show')->name('users.show');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');

    Route::get('/products', 'ProductController@index')->name('products.index');
    Route::get('/products/create', 'ProductController@create')->name('products.create');
    Route::post('/products/store', 'ProductController@store')->name('products.store');
    Route::put('/products/{product}', 'ProductController@update')->name('products.update');
    Route::get('/products/{product}', 'ProductController@show')->name('products.show');
    Route::get('/products/{product}/edit', 'ProductController@edit')->name('products.edit');
    Route::delete('/products/{product}', 'ProductController@destroy')->name('products.destroy');

    Route::get('/clients', 'ClientController@index')->name('clients.index');
    Route::get('/clients/create', 'ClientController@create')->name('clients.create');
    Route::post('/clients/store', 'ClientController@store')->name('clients.store');
    Route::get('/clients/{client}/show', 'ClientController@show')->name('clients.show');
    Route::get('/clients/{client}/edit', 'ClientController@edit')->name('clients.edit');
    Route::delete('/clients/{client}', 'ClientController@destroy')->name('clients.destroy');
    Route::put('/clients/{client}', 'ClientController@update')->name('clients.update');

    Route::get('/invoices', 'InvoiceController@index')->name('invoices.index');
    Route::get('/invoices/create', 'InvoiceController@create')->name('invoices.create');
    Route::post('/invoices/store', 'InvoiceController@store')->name('invoices.store');
    Route::get('/invoices/{invoice}', 'InvoiceController@show')->name('invoices.show');
    Route::get('/invoices/{invoice}/edit', 'InvoiceController@edit')->name('invoices.edit');
    Route::delete('/invoices/{invoice}', 'InvoiceController@destroy')->name('invoices.destroy');
    Route::put('/invoices/{invoice}', 'InvoiceController@update')->name('invoices.update');

    Route::get('/stocks', 'StockController@index')->name('stocks.index');


});

//Routes Store

Route::get('/layout', function () {
    return view('store.layout.layout');
});




