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

Route::namespace('Dashboard')->prefix('dashboard')->name('dashboard.')->group( function () {

    Route::get('/principal', 'MainController@index')->name('main');

    Route::resource('/usuarios', 'UsersController')
        ->parameters([ 'usuarios' => 'user' ])->names('users')
        ->only([ 'index', 'show', 'edit', 'update', 'destroy' ]);
    // Route::get('usuarios', 'UsersController@index')->name('users.index');
    // Route::get('usuarios/{user}', 'UsersController@show')->name('users.show');
    // Route::get('usuarios/{user}/edit', 'UsersController@edit')->name('users.edit');
    // Route::put('usuarios/{user}', 'UsersController@update')->name('users.update');
    // Route::delete('usuarios/{user}', 'UsersController@destroy')->name('users.destroy');

    Route::resource('roles', 'RoleController')->except([ 'show' ]);

    Route::resource('/igrejas', 'ChurchController')
        ->parameters([ 'igrejas' => 'church' ])->names('churches');

    Route::resource('/congregacoes', 'CongregationController')
        ->parameters([ 'congregacoes' => 'congregation' ])->names('congregations');

    Route::resource('/classes', 'ClassroomController')
        ->parameters([ 'classes' => 'classroom' ])->names('classrooms');

    Route::resource('/membros', 'MemberController')
        ->parameters([ 'membros' => 'member' ])->names('members');

    Route::resource('/eventos', 'EventController')
        ->parameters([ 'eventos' => 'event' ])->names('events');

    Route::resource('/compromissos', 'ScheduleController')
        ->parameters([ 'compromissos' => 'schedule' ])->names('schedules');

    Route::resource('/contas', 'AccountController')
        ->parameters([ 'contas' => 'account' ])->names('accounts');

    Route::resource('/categorias-receita', 'IncomeCategoryController')
        ->parameters([ 'categorias-receita' => 'income_category' ])->names('income_categories');

    Route::resource('/categorias-despesa', 'ExpenseCategoryController')
        ->parameters([ 'categorias-despesa' => 'expense_category' ])->names('expense_categories');

    Route::resource('/receitas', 'IncomeController')
        ->parameters([ 'receitas' => 'income' ])->names('incomes');

    Route::resource('/despesas', 'ExpenseController')
        ->parameters([ 'despesas' => 'expense' ])->names('expenses');
});
