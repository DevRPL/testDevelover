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


Route::get('/', function () {
    return view('welcome');
});


Route::get('/test1', 'TestController@index');
Route::post('sendPost', 'TestController@create');


Route::redirect('/login', '/login')->name('home');

Auth::routes();

Route::get('/logout', 'AuthController@logout')->name('logout');
    
Route::group(['prefix' => 'master', 'namespace' => 'Master', 'middleware' => ['auth'], 'as' => 'master.'], function () {
    Route::resource('users', 'UserController');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::resource('customers', 'CustomerController');
    Route::resource('products', 'ProductController');
    Route::resource('transaksis', 'TransactionController');
});