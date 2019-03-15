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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/document/store', 'DocumentController@store')->name('document.store');

//Will grade the student
Route::patch('/document/grade/{id}', 'DocumentController@grade')->name('document.grade');

//This routes will be for admin only
Route::group(['middleware' => 'Admin'], function () {
    Route::get('/accounts', 'AccountsController@index')->name('accounts');
    Route::get('/account/create', 'AccountsController@create')->name('account.create');
    Route::post('/account/store', 'AccountsController@store')->name('account.store');
    Route::get('/account/edit/{id}', 'AccountsController@edit')->name('account.edit');
    Route::patch('/account/update/{id}', 'AccountsController@update')->name('account.update');
    Route::delete('/accounts/destroy/{id}', 'AccountsController@destroy')->name('account.delete');
});

