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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::namespace('Dashboard')->prefix('dashboard')->name('dashboard.')->group( function () {

    Route::resource('/usuarios', UsersController::class)
        ->parameters([ 'usuarios' => 'user' ])->names('users')
        ->only([ 'index', 'show', 'edit', 'update', 'destroy' ]);
    // Route::get('usuarios', 'UsersController@index')->name('users.index');
    // Route::get('usuarios/{user}', 'UsersController@show')->name('users.show');
    // Route::get('usuarios/{user}/edit', 'UsersController@edit')->name('users.edit');
    // Route::put('usuarios/{user}', 'UsersController@update')->name('users.update');
    // Route::delete('usuarios/{user}', 'UsersController@destroy')->name('users.destroy');

    Route::resource('/igrejas', ChurchController::class)
        ->parameters([ 'igrejas' => 'church' ])->names('churches');

    Route::resource('/congregacoes', CongregationController::class)
        ->parameters([ 'congregacoes' => 'congregation' ])->names('congregations');

    Route::resource('/classes', ClassroomController::class)
        ->parameters([ 'classes' => 'classroom' ])->names('classrooms');

    Route::resource('/membros', MemberController::class)
        ->parameters([ 'membros' => 'member' ])->names('members');
    Route::get('/members/pdf', [\App\Http\Controllers\Dashboard\MemberController::class, 'pdf'])->name('members');

    Route::resource('/eventos', EventController::class)
        ->parameters([ 'eventos' => 'event' ])->names('events');

    Route::resource('/compromissos', AppointmentController::class)
        ->parameters([ 'compromissos' => 'appointment' ])->names('appointments');

    Route::resource('/contas', AccountController::class)
        ->parameters([ 'contas' => 'account' ])->names('accounts');

    Route::resource('/categorias-receita', IncomeCategoryController::class)
        ->parameters([ 'categorias-receita' => 'income_category' ])->names('income_categories');

    Route::resource('/categorias-despesa', ExpenseCategoryController::class)
        ->parameters([ 'categorias-despesa' => 'expense_category' ])->names('expense_categories');

    Route::resource('/receitas', IncomeController::class)
        ->parameters([ 'receitas' => 'income' ])->names('incomes');

    Route::resource('/despesas', ExpenseController::class)
        ->parameters([ 'despesas' => 'expense' ])->names('expenses');
});
