<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
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

// Kategori Controller
Route::middleware('auth')->controller(CategoryController::class)->group(function () {
    Route::get('category', 'index')->name('category');
    Route::post('category', 'store')->name('category.store');
    Route::get('fetchCategory', 'fetchCategory')->name('category.fetch');
    Route::get('category/edit', 'edit')->name('category.edit');
    Route::post('category/edit', 'update')->name('category.update');
    Route::get('category/trash', 'trashCategory')->name('category.trashCategory');
    Route::get('category/fetchTrashCategory', 'fetchTrashCategory')->name('category.fetchTrashCategory');
    Route::post('category/restore', 'restore')->name('category.restore');
    Route::post('category/restore/selected', 'restoreSelected')->name('category.restoreSelected');
    Route::post('category/destroy', 'destroy')->name('category.destroy');
    Route::post('category/destroy/selected', 'destroySelected')->name('category.destroySelected');
    Route::post('category/destroy/permanent', 'destroyPermanent')->name('category.destroyPermanent');
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

// USER //
Route::get('/beranda', function () {
    return view('user.homepage');
});

Route::get('/produk', function () {
    return view('user.product');
});