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

Route::namespace('Dashboard')->prefix('dashboard')->name('dashboard.')->group(function(){
    Route::resource('/usuarios', 'UsersController')->parameters([ 'usuarios' => 'user' ])->names('users')->middleware('can:manage-users');
    Route::resource('/igrejas', 'ChurchController')->parameters([ 'igrejas' => 'church' ])->names('churches')->middleware('can:manage-churches');
});