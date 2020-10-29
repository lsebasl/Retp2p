<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Auth::routes(["verify" => true]);

Route::get('/verify', function () {
    return view('auth.verify');
});

//Free access to public
Route::get('/','Store\HomeController@index')->name('home.store');
Route::get('/home-store','Store\HomeController@index')->name('home.store');
Route::get('/about', 'Store\AboutController@index')->name('store.about');

Route::get('/goods', 'Store\GoodsController@index')->name('goods.index');
Route::get('/goods/category/{category}', 'Store\GoodsController@category')->name('goods.category');
Route::get('/goods/show/{show}', 'Store\GoodsController@show')->name('goods.show');


Route::middleware(['auth','user.status','verified'])->group(function () {

    //project routes
    //roles Routes

    Route::get('/roles','RoleController@index')->name('roles.index')->middleware('permission:roles.index');
    Route::get('/roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
    Route::post('/roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
    Route::put('/roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
    Route::delete('/roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
    Route::get('/roles/{role}/show', 'RoleController@show')->name('roles.show')->middleware('permission:export');
    Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');

    //Export Routes

    Route::get('/export','ProductController@export')->name('export')->middleware('permission:export');
    Route::post('/import','ProductController@import')->name('import')->middleware('permission:import');

    //User Routes

    Route::get('/payment', 'PaymentAttemptController@paymentAttempt')->name('payment.attempt')->middleware('permission:payment.attempt');
    Route::get('/payment/history', 'PaymentAttemptController@history')->name('payment.history')->middleware('permission:payment.history');
    Route::get('/payment/callback', 'PaymentAttemptController@callback')->name('payment.callback')->middleware('permission:payment.callback');

    Route::get('/profile', 'Store\ProfileController@index')->name('store.profile');
    Route::post('/cart/add','Store\CartController@add')->name('cart.add')->middleware('permission:cart.add');
    Route::get('/cart/show', 'Store\CartController@show')->name('cart.show')->middleware('permission:cart.show');
    Route::put('/cart/update/{item}', 'Store\CartController@update')->name('cart.update')->middleware('permission:cart.update');
    Route::delete('/cart/delete/{item}', 'Store\CartController@destroy')->name('cart.destroy')->middleware('permission:cart.destroy');

    //Admin Routes

    Route::get('/home', 'HomeController@index')->name('home')->middleware('permission:home');

    Route::get('/users', 'UserController@index')->name('users.index')->middleware('permission:users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create')->middleware('permission:users.create');
    Route::post('/users/store', 'UserController@store')->name('users.store')->middleware('permission:users.create');
    Route::put('/users/{user}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('permission:users.destroy');
    Route::get('/users/{user}/show', 'UserController@show')->name('users.show')->middleware('permission:users.show');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');

    Route::get('/products', 'ProductController@index')->name('products.index')->middleware('permission:products.index');
    Route::get('/products/create', 'ProductController@create')->name('products.create')->middleware('permission:products.create');
    Route::post('/products/store', 'ProductController@store')->name('products.store')->middleware('permission:products.create');
    Route::put('/products/{product}', 'ProductController@update')->name('products.update')->middleware('permission:products.edit');
    Route::get('/products/{product}', 'ProductController@show')->name('products.show')->middleware('permission:products.show');
    Route::get('/products/{product}/edit', 'ProductController@edit')->name('products.edit')->middleware('permission:products.edit');
    Route::delete('/products/{product}', 'ProductController@destroy')->name('products.destroy')->middleware('permission:products.destroy');

    Route::get('/clients', 'ClientController@index')->name('clients.index')->middleware('permission:clients.index');
    Route::get('/clients/create', 'ClientController@create')->name('clients.create')->middleware('permission:clients.create');
    Route::post('/clients/store', 'ClientController@store')->name('clients.store')->middleware('permission:clients.create');
    Route::get('/clients/{client}/show', 'ClientController@show')->name('clients.show')->middleware('permission:clients.show');
    Route::get('/clients/{client}/edit', 'ClientController@edit')->name('clients.edit')->middleware('permission:clients.edit');
    Route::delete('/clients/{client}', 'ClientController@destroy')->name('clients.destroy')->middleware('permission:clients.destroy');

    Route::get('/invoices', 'InvoiceController@index')->name('invoices.index')->middleware('permission:invoices.index');
    Route::get('/invoices/create', 'InvoiceController@create')->name('invoices.create')->middleware('permission:invoices.create');
    Route::post('/invoices/store', 'InvoiceController@store')->name('invoices.store')->middleware('permission:invoices.create');
    Route::get('/invoices/{invoice}', 'InvoiceController@show')->name('invoices.show')->middleware('permission:invoices.show');
    Route::get('/invoices/{invoice}/edit', 'InvoiceController@edit')->name('invoices.edit')->middleware('permission:invoices.edit');
    Route::delete('/invoices/{invoice}', 'InvoiceController@destroy')->name('invoices.destroy')->middleware('permission:invoices.destroy');
    Route::put('/invoices/{invoice}', 'InvoiceController@update')->name('invoices.update')->middleware('permission:invoices.edit');

    Route::get('/stocks', 'StockController@index')->name('stocks.index')->middleware('permission:stocks.index');;

});

//Routes Layout

Route::get('/layout', function () {
    return view('store.layout.layout');
});




