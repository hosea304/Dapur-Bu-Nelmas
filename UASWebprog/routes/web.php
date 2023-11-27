<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

Route::middleware('auth')->controller(DashboardController::class)->group(function () {
    Route::get('dashboard', 'index')->name('dashboard');
});

Route::middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('user', 'index')->name('user');
    Route::get('fetchUser', 'fetchUser')->name('user.fetch');
});


Route::get('403', function () {
    abort(403);
})->name('403');

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login.index');

    Route::post('login', 'store')->name('login.store');

    Route::post('logout', 'logout')->name('logout');
});
