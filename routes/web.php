<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', function () {
        return view('profile');
    });

    Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers');
    Route::post('/customer/store', [App\Http\Controllers\CustomerController::class, 'store']);
    Route::get('/customer/edit', [App\Http\Controllers\CustomerController::class, 'edit']);
    Route::post('/customer/update', [App\Http\Controllers\CustomerController::class, 'update']);
    Route::get('/customer/delete', [App\Http\Controllers\CustomerController::class, 'delete']);

    Route::get('/search', [App\Http\Controllers\CustomerController::class, 'search']);
    Route::get('/filter', [App\Http\Controllers\CustomerController::class, 'filter']);
});
