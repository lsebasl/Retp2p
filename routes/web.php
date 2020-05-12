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

Route::get('/clients', 'ClientsController@index')->name('clients.index');
Route::get('/clients/create', 'ClientsController@create')->name('clients.create');
Route::post('/clients/store', 'ClientsController@store')->name('clients.store');
Route::get('/clients/{client}','ClientsController@show')->name('clients.show');
Route::get('/clients/{client}/edit','ClientsController@edit')->name('clients.edit');
Route::put('/clients/{client}','ClientsController@update')->name('clients.update');
Route::delete('/clients/{client}','ClientsController@destroy')->name('clients.destroy');

Route::get('/invoices', 'InvoicesController@index')->name('invoices.index');
Route::get('/invoices/create', 'InvoicesController@create')->name('invoices.create');
Route::post('/invoices/store', 'InvoicesController@store')->name('invoices.store');
Route::get('/invoices/{invoice}','InvoicesController@show')->name('invoices.show');
Route::get('/invoices/{invoice}/edit','InvoicesController@edit')->name('invoices.edit');
Route::put('/invoices/{invoice}','InvoicesController@update')->name('invoices.update');
Route::delete('/invoices/{invoice}','InvoicesController@destroy')->name('invoices.destroy');

Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/create', 'ProductsController@create')->name('products.create');
Route::post('/products/store', 'ProductsController@store')->name('products.store');
Route::get('/products/{product}','ProductsController@show')->name('products.show');
Route::get('/products/{product}/edit','ProductsController@edit')->name('products.edit');
Route::put('/products/{product}','ProductsController@update')->name('products.update');
Route::delete('/products/{product}','ProductsController@destroy')->name('products.destroy');

Route::get('/sellers', 'sellersController@index')->name('sellers.index');
Route::get('/sellers/create', 'sellersController@create')->name('sellers.create');
Route::post('/sellers/store', 'sellersController@store')->name('sellers.store');
Route::get('/sellers/{seller}','sellersController@show')->name('sellers.show');
Route::get('/sellers/{seller}/edit','sellersController@edit')->name('sellers.edit');
Route::put('/sellers/{seller}','sellersController@update')->name('sellers.update');
Route::delete('/sellers/{seller}','sellersController@destroy')->name('sellers.destroy');
