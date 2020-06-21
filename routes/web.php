<?php

use Illuminate\Support\Facades\Route;


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
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/create', 'UsersController@create')->name('users.create');
    Route::post('/users/store', 'UsersController@store')->name('users.store');
    Route::put('/users/{user}', 'UsersController@update')->name('users.update');
    Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
    Route::get('/users/{user}/show', 'UsersController@show')->name('users.show');
    Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');

    Route::get('/products', 'ProductsController@index')->name('products.index');
    Route::get('/products/create', 'ProductsController@create')->name('products.create');
    Route::post('/products/store', 'ProductsController@store')->name('products.store');
    Route::put('/products/{product}', 'ProductsController@update')->name('products.update');
    Route::get('/products/{product}', 'ProductsController@show')->name('products.show');
    Route::get('/products/{product}/edit', 'ProductsController@edit')->name('products.edit');
    Route::delete('/products/{product}', 'ProductsController@destroy')->name('products.destroy');

    Route::get('/clients', 'ClientsController@index')->name('clients.index');
    Route::get('/clients/create', 'ClientsController@create')->name('clients.create');
    Route::post('/clients/store', 'ClientsController@store')->name('clients.store');
    Route::get('/clients/{client}/show', 'ClientsController@show')->name('clients.show');
    Route::get('/clients/{client}/edit', 'ClientsController@edit')->name('clients.edit');
    Route::delete('/clients/{client}', 'ClientsController@destroy')->name('clients.destroy');
    Route::put('/clients/{client}', 'ClientsController@update')->name('clients.update');

    Route::get('/invoices', 'InvoicesController@index')->name('invoices.index');
    Route::get('/invoices/create', 'InvoicesController@create')->name('invoices.create');
    Route::post('/invoices/store', 'InvoicesController@store')->name('invoices.store');
    Route::get('/invoices/{invoice}', 'InvoicesController@show')->name('invoices.show');
    Route::get('/invoices/{invoice}/edit', 'InvoicesController@edit')->name('invoices.edit');
    Route::delete('/invoices/{invoice}', 'InvoicesController@destroy')->name('invoices.destroy');
    Route::put('/invoices/{invoice}', 'InvoicesController@update')->name('invoices.update');

    Route::get('/stocks', 'StocksController@index')->name('stocks.index');
});

//Routes Store

Route::get('/layout', function () {
    return view('store.layout.layout');
});




