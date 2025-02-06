<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth', 'prefix' => '/'], function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'component', 'as' => 'component.'], function () {
        Route::get('accordion', function () {
            return view('mazer.components.accordion');
        })->name('accordion');
    });

    Route::get('products/search', [ProductController::class, 'search'])->name('products.search');
    Route::resource('products', ProductController::class);

    Route::get('users/search', [UserController::class, 'search'])->name('users.search');
    Route::resource('users', UserController::class);

    Route::delete('transactions/remove-from-chart/{transactionDetail}', [TransactionController::class, 'removeFromChart'])->name('transactions.remove-from-chart');
    Route::post('transactions/add-to-chart', [TransactionController::class, 'addToChart'])->name('transactions.add-to-chart');
    Route::get('transactions/print/{transaction}', [TransactionController::class, 'print'])->name('transactions.print');
    Route::get('transactions/search', [TransactionController::class, 'search'])->name('transactions.search');
    Route::resource('transactions', TransactionController::class);
});

require_once __DIR__ . "/auth.php";
