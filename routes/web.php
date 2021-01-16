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

Route::namespace('Dashboard')->prefix('dashboard')->middleware(['auth'])->name('dashboard.')->group( function () {

    Route::resource('/usuarios', UsersController::class)
        ->parameters([ 'usuarios' => 'user' ])->names('users')
        ->only([ 'index', 'show', 'edit', 'update', 'destroy' ]);

    Route::resource('/igrejas', ChurchController::class)
        ->parameters([ 'igrejas' => 'church' ])->names('churches');

    Route::resource('/congregacoes', CongregationController::class)
        ->parameters([ 'congregacoes' => 'congregation' ])->names('congregations');

    Route::resource('/classes', ClassroomController::class)
        ->parameters([ 'classes' => 'classroom' ])->names('classrooms');

    Route::resource('/membros', MemberController::class)
        ->parameters([ 'membros' => 'member' ])->names('members');

    // Relatório simplificado de toda a membresia
    Route::get('/membresia/relatorio-simples', [
        \App\Http\Controllers\Dashboard\MemberController::class,
        'simpleReport'
    ])->name('members.simple-report');

    // Relatório simplificado de membros inativos
    Route::get('/membresia/relatorio-inativos', [
        \App\Http\Controllers\Dashboard\MemberController::class,
        'inactivesReport'
    ])->name('members.inactives-report');

    // Relatório anual do balanço membros
    Route::get('/membresia/relatorio-anual', [
        \App\Http\Controllers\Dashboard\MemberController::class,
        'anualReport'
    ])->name('members.anual-report');

    // Relatório personalizado de membresia
    Route::get('/membresia/relatorio-personalizado', [
        \App\Http\Controllers\Dashboard\MemberController::class,
        'customReport'
    ])->name('members.custom-report');

    // Relatório individual de membro
    Route::get('/membros/{member}/pdf', [
        \App\Http\Controllers\Dashboard\MemberController::class,
        'individualReport'
    ])->name('members.individual-report');

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
