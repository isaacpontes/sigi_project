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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/usuarios', 'UsersController')->names('users')->middleware('can:manage-users');
    Route::get('/igrejas', 'ChurchController@index')->name('churches.index')->middleware('can:manage-churches');
    Route::delete('/igrejas/{igreja}', 'ChurchController@destroy')->name('churches.destroy')->middleware('can:manage-churches');
    Route::put('/igrejas/{igreja}', 'ChurchController@update')->name('churches.update')->middleware('can:manage-churches');
    Route::get('/igrejas/{igreja}/edit', 'ChurchController@edit')->name('churches.edit')->middleware('can:manage-churches');

});

