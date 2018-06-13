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

Auth::routes();
Route::get('/', 'IndexController@index')->name('index');

Route::middleware(['auth'])->group(function () {
    Route::get('account', 'Account\AccountController@index')->name('account');
    Route::get('rates', 'Account\AccountController@rates')->name('rates');
    Route::get('promo_codes', 'Account\AccountController@promo_codes')->name('promo_codes');
    Route::get('settings', 'Account\AccountController@settings')->name('settings');

    Route::post('edit_name', 'Account\PostController@edit_name')->name('edit_name');
    Route::post('edit_email', 'Account\PostController@edit_email')->name('edit_email');
    Route::post('edit_phone', 'Account\PostController@edit_phone')->name('edit_phone');
    Route::post('edit_password', 'Account\PostController@edit_password')->name('edit_password');

    Route::post('add_rate', 'Account\PostController@add_rate')->name('add_rate');
    Route::post('edit_rate/{rate_id}', 'Account\PostController@edit_rate')->name('edit_rate');
    Route::post('delete_rate/{rate_id}', 'Account\PostController@delete_rate')->name('delete_rate');

    Route::post('add_promo_code', 'Account\PostController@add_promo_code')->name('add_promo_code');
    Route::post('edit_promo_code/{code_id}', 'Account\PostController@edit_promo_code')->name('edit_promo_code');
    Route::post('delete_promo_code/{code_id}', 'Account\PostController@delete_promo_code')->name('delete_promo_code');

    Route::post('edit_settings', 'Account\PostController@edit_settings')->name('edit_settings');

    Route::get('games', 'Account\GameController@index')->name('games');
    Route::post('add_game', 'Account\GameController@add_game')->name('add_game');
    Route::post('edit_game/{game_id}', 'Account\GameController@edit_game')->name('edit_game');
    Route::post('delete_game/{game_id}', 'Account\GameController@delete_game')->name('delete_game');
});

Route::post('add_pay', 'Account\PaymentController@add_pay')->name('add_pay');
Route::get('set_promo_code', 'Account\PaymentController@set_promo_code')->name('set_promo_code');

// OAuth Routes
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

/* Log viewer */
Route::get('l_v_', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

