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
    return view('login');
});

Route::post('/', 'userController@admin');

// // Route::get('customer', 'CustomerController@customer');
// Route::get('customer', 'CustomerController@customer_join');
// Route::get('{id}/edit', 'CustomerController@edit')->name('customer.edit');
// Route::post('update/{id}', 'CustomerController@update')->name('customer.update');
// Route::delete('delete/{id}', 'CustomerController@destroy')->name('customer.delete');
// Route::post('store', ['as' => 'customer.store', 'uses' => 'CustomerController@store']);



Route::resource('customers', 'ResourceController');
Route::get('/cus', 'ResourceController@index');
Route::post('/customerses/{id}', ['as' => 'cus.ah', 'uses' => 'ResourceController@update']);

Auth::routes();

Route::get('/home', 'ResourceController@index')->name('home');
