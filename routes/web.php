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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/show', function () {
    return view('clients.show');
});
Route::get('/login-sebas', function () {
    return view('auth.login');
});
Route::get('/verify', function () {
    return view('auth.verify');
});
Route::get('/verify', function () {
    return view('auth.verify');
});

//login routes
Route::get('/register', 'RegisterController@index')->name('register.index');
Route::get('/register/create', 'RegisterController@create')->name('register.create');
Route::post('/register/store', 'RegisterController@store')->name('register.store');


//proyects routes
Route::get('/clients', 'ClientsController@index')->name('clients.index');
Route::get('/clients/create', 'ClientsController@create')->name('clients.create');
Route::post('/clients/store', 'ClientsController@store')->name('clients.store');
Route::get('/clients/{client}/show','ClientsController@show')->name('clients.show');
Route::get('/clients/{client}/edit','ClientsController@edit')->name('clients.edit');
Route::delete('/clients/{client}','ClientsController@destroy')->name('clients.destroy');
Route::put('/clients/{client}','ClientsController@update')->name('clients.update');

Route::get('/invoices', 'InvoicesController@index')->name('invoices.index');
Route::get('/invoices/create', 'InvoicesController@create')->name('invoices.create');
Route::post('/invoices/store', 'InvoicesController@store')->name('invoices.store');
Route::get('/invoices/{invoice}','InvoicesController@show')->name('invoices.show');
Route::get('/invoices/{invoice}/edit','InvoicesController@edit')->name('invoices.edit');
Route::delete('/invoices/{invoice}','InvoicesController@destroy')->name('invoices.destroy');
Route::put('/invoices/{invoice}','InvoicesController@update')->name('invoices.update');

Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/create', 'ProductsController@create')->name('products.create');
Route::post('/products/store', 'ProductsController@store')->name('products.store');
Route::get('/products/{product}','ProductsController@show')->name('products.show');
Route::get('/products/{product}/edit','ProductsController@edit')->name('products.edit');
Route::delete('/products/{product}','ProductsController@destroy')->name('products.destroy');
Route::put('/products/{product}','ProductsController@update')->name('products.update');

Route::get('/stock', 'StockController@index')->name('stock.index');
Route::get('/stock/create', 'StockController@create')->name('stock.create');
Route::post('/stock/store', 'StockController@store')->name('stock.store');
Route::get('/stock/{seller}','StockController@show')->name('stock.show');
Route::get('/stock/{seller}/edit','StockController@edit')->name('stocks.edit');
Route::delete('/stock/{seller}','StockController@destroy')->name('stock.destroy');
Route::put('/stock/{seller}','StockController@update')->name('stock.update');


Auth::routes();
Auth::routes(["verify" => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
