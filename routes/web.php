<?php

use App\Http\Controllers\Dashboard\FinancialCategoryController;
use App\Http\Controllers\Dashboard\StartController;
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

require __DIR__ . '/auth.php';

Route::namespace('Dashboard')->prefix('dashboard')->middleware(['auth'])->name('dashboard.')->group(function () {
    Route::get('/', [StartController::class, 'index'])->name('start');

    Route::put('/usuarios/{user}/update-info', [
        \App\Http\Controllers\Dashboard\UsersController::class,
        'updateInfo'
    ])->name('users.update-info');

    Route::post('/usuarios/{user}/update-password', [
        \App\Http\Controllers\Dashboard\UsersController::class,
        'updatePassword'
    ])->name('users.update-password');

    Route::resource('/usuarios', UsersController::class)
        ->parameters(['usuarios' => 'user'])
        ->names('users');

    Route::get('/igreja', [
        \App\Http\Controllers\Dashboard\ChurchController::class,
        'show'
    ])->name('church.show');

    Route::put('/igreja', [
        \App\Http\Controllers\Dashboard\ChurchController::class,
        'update'
    ])->name('church.update');

    Route::get('/congregacoes/lista-pdf', [
        \App\Http\Controllers\Dashboard\CongregationController::class,
        'exportPdfList'
    ])->name('pdf-list.congregations');

    Route::resource('/congregacoes', CongregationController::class)
        ->parameters(['congregacoes' => 'congregation'])->names('congregations');

    Route::prefix('membresia')->name('membership.')->middleware('auth.membership')->group(function () {
        // Listagem de todas as classes de estudo
        Route::get('/classes/lista-pdf', [
            \App\Http\Controllers\Dashboard\ClassroomController::class,
            'exportPdfList'
        ])->name('classrooms.pdf-list');

        Route::resource('/classes', ClassroomController::class)
            ->parameters(['classes' => 'classroom'])->names('classrooms');

        // Relatório simplificado de toda a membresia
        Route::get('/membros/relatorio-simples', [
            \App\Http\Controllers\Dashboard\MemberController::class,
            'simpleReport'
        ])->name('members.simple-report');

        // Relatório simplificado de membros inativos
        Route::get('/membros/relatorio-inativos', [
            \App\Http\Controllers\Dashboard\MemberController::class,
            'inactivesReport'
        ])->name('members.inactives-report');

        // Relatório anual do balanço membros
        Route::get('/membros/relatorio-anual', [
            \App\Http\Controllers\Dashboard\MemberController::class,
            'anualReport'
        ])->name('members.anual-report');

        // Relatório personalizado de membresia
        Route::get('/membros/relatorio-personalizado', [
            \App\Http\Controllers\Dashboard\MemberController::class,
            'customReport'
        ])->name('members.custom-report');

        Route::resource('/membros', MemberController::class)
            ->parameters(['membros' => 'member'])->names('members');

        Route::put('/membros/{member}/readmit', [
            \App\Http\Controllers\Dashboard\MemberController::class,
            'readmit'
        ])->name('members.readmit');

        Route::get('/membros/{member}/demit', [
            \App\Http\Controllers\Dashboard\MemberController::class,
            'demit'
        ])->name('members.demit');

        // Relatório individual de membro
        Route::get('/membros/{member}/pdf', [
            \App\Http\Controllers\Dashboard\MemberController::class,
            'individualReport'
        ])->name('members.individual-report');

        Route::resource('/eventos', EventController::class)
            ->parameters(['eventos' => 'event'])->names('events');
    });

    Route::resource('/compromissos', AppointmentController::class)
        ->parameters(['compromissos' => 'appointment'])
        ->names('appointments');

    Route::prefix('financas')->name('finances.')->middleware('auth.finances')->group(function () {
        // Relatório financeiro personalizado
        Route::get('/contas/relatorio-personalizado', [
            \App\Http\Controllers\Dashboard\AccountController::class,
            'customReport'
        ])->name('accounts.custom-report');

        // Relatório geral de todas as contas
        Route::get('/contas/resumo-geral', [
            \App\Http\Controllers\Dashboard\AccountController::class,
            'generalResume'
        ])->name('accounts.general-resume');

        // Relatório simplificado individual de conta
        Route::get('/contas/{account}/resumo-individual', [
            \App\Http\Controllers\Dashboard\AccountController::class,
            'individualResume'
        ])->name('accounts.individual-resume');

        Route::resource('/contas', AccountController::class)
            ->parameters(['contas' => 'account'])->names('accounts');

        Route::prefix('categories')->name('categories')->group(function () {
            Route::get('/', [
                FinancialCategoryController::class, 'index'
            ]);

            Route::resource('/receitas', IncomeCategoryController::class)
                ->parameters(['receitas' => 'income_category'])
                ->names('-incomes')
                ->only([
                    'index',
                    'store',
                    'show',
                    'edit',
                    'update',
                    'destroy'
                ]);

            Route::resource('/despesas', ExpenseCategoryController::class)
                ->parameters(['despesas' => 'expense_category'])
                ->names('-expenses')
                ->only([
                    'index',
                    'store',
                    'show',
                    'edit',
                    'update',
                    'destroy'
                ]);
        });

        Route::resource('/receitas', IncomeController::class)
            ->parameters([
                'receitas' => 'income'
            ])->names('incomes');

        Route::resource('/despesas', ExpenseController::class)
            ->parameters([
                'despesas' => 'expense'
            ])->names('expenses');
    });
});
