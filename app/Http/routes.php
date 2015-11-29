<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('admin/account');
});

Route::get('/login', 'Auth\AuthController@getLogin')->name('login');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout')->name('logout');

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    Route::get('my/edit', ['uses' => 'Auth\AuthController@edit', 'as' => 'admin.my.edit']);
    Route::put('my/edit', ['uses' => 'Auth\AuthController@update', 'as' => 'admin.my.update']);
    Route::get('account/find', ['uses'  => 'Admin\AccountController@find', 'as' => 'admin.account.find']);
    Route::get('log',['uses' => 'Admin\LogController@index', 'as'=> 'admin.log.index']);
    Route::post('account/find', 'Admin\AccountController@doFind');

    Route::controller('reports', 'Admin\ReportController', [
    	'getIndex' => 'admin.reports.index',
    ]);

    Route::resource('user', 'SuperUser\UserController');
    Route::resource('account', 'Admin\AccountController');
    Route::resource('transaction', 'Admin\TransactionController');
});