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

Route::group([
    'namespace' => 'App\Http\Controllers',
], function () {
    Route::group([
        'as' => 'tariff.',
        'prefix' => 'tariff',
    ], function () {
        Route::get('all', 'TariffController@all')->name('all');
    });

    Route::group([
        'as' => 'order.',
        'prefix' => 'order',
    ], function () {
        Route::post('store', 'OrderController@store')->name('store');
    });
});
