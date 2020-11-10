<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Api\Admin\AuthController@login');
    Route::post('signup', 'Api\Admin\AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Api\Admin\AuthController@logout');
        Route::get('user', 'Api\Admin\AuthController@user');
    });
});

Route::middleware(['client-credentials'])->group(function () {

Route::resource('products', 'Api\Admin\ProductController')->except(['edit', 'create']);

});
