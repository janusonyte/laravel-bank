<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientController as C;
use App\Http\Controllers\AccountController as A;
use App\Http\Controllers\TransferController as T;
use App\Http\Controllers\TaxesController as F;


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

// Clients
Route::prefix('clients')->name('clients-')->group(function () {

    Route::get('/', [C::class, 'index'])->name('index');
    Route::get('/create', [C::class, 'create'])->name('create');
    Route::post('/', [C::class, 'store'])->name('store');
    Route::get('/edit/{client}', [C::class, 'edit'])->name('edit');
    Route::put('/{client}', [C::class, 'update'])->name('update');
    Route::get('/delete/{client}', [C::class, 'delete'])->name('delete');
    Route::delete('/{client}', [C::class, 'destroy'])->name('destroy');

    // Taxes - Charge (action)
    Route::get('/charge', [C::class, 'charge'])->name('charge');
});

// Accounts
Route::prefix('accounts')->name('accounts-')->group(function () {

    Route::get('/', [A::class, 'index'])->name('index');
    Route::get('/create', [A::class, 'create'])->name('create');
    Route::post('/', [A::class, 'store'])->name('store');
    Route::get('/edit/{account}', [A::class, 'edit'])->name('edit');
    Route::put('/{account}', [A::class, 'update'])->name('update');
    Route::get('/delete/{account}', [A::class, 'delete'])->name('delete');
    Route::delete('/{account}', [A::class, 'destroy'])->name('destroy');
});

Route::prefix('transfer')->name('transfer-')->group(function () {
    Route::get('/moneytransfer', [T::class, 'moneytransfer'])->name('moneytransfer');
    Route::put('/moneytransfer', [T::class, 'transfer'])->name('transfer');
});

// Taxes (view)
Route::get('/home', [F::class, 'index'])->name('home');

// Login/logout
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
