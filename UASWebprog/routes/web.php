<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\PerDayMenuController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    if (auth()->user()->usertype === 'admin') {
        return view('backend.dashboard.index');
    } else {
        return redirect('/beranda');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

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

Route::middleware('auth')->controller(FoodsController::class)->group(function () {
    Route::get('foods', 'index')->name('foods');
    Route::post('foods', 'store')->name('foods.store');
    Route::get('fetchFoods', 'fetchFoods')->name('foods.fetch');
    Route::get('foods/edit', 'edit')->name('foods.edit');
    Route::post('foods/edit', 'update')->name('foods.update');
    Route::get('foods/trash', 'trashFoods')->name('foods.trashFoods');
    Route::get('foods/fetchTrashFoods', 'fetchTrashFoods')->name('foods.fetchTrashFoods');
    Route::post('foods/restore', 'restore')->name('foods.restore');
    Route::post('foods/restore/selected', 'restoreSelected')->name('foods.restoreSelected');
    Route::post('foods/destroy', 'destroy')->name('foods.destroy');
    Route::post('foods/destroy/selected', 'destroySelected')->name('foods.destroySelected');
    Route::post('foods/destroy/permanent', 'destroyPermanent')->name('foods.destroyPermanent');
});

// per day menu
Route::middleware('auth')->controller(PerDayMenuController::class)->group(function () {
    Route::get('perdaymenu', 'index')->name('perdaymenu');
    Route::post('perdaymenu', 'store')->name('perdaymenu.store');
    Route::get('perdaymenu/perday', 'perday')->name('perdaymenu.perday');
    Route::get('perdaymenu/fetch', 'fetchFoods')->name('perdaymenu.fetch');
    Route::post('perdaymenu/destroy', 'destroy')->name('perdaymenu.destroy');
    Route::post('perdaymenu/destroy/selected', 'destroySelected')->name('perdaymenu.destroySelected');
});


Route::get('403', function () {
    abort(403);
})->name('403');



Route::get('/cart', function () {
    return view('user.cart');
})->name('cart');

Route::get('/akun', function () {
    return view('user.akun');
})->name('akun');

Route::get('/checkout', function () {
    return view('user.checkout');
})->name('checkout');

Route::get('/cart', function () {
    return view('user.cart');
})->name('cart');


Route::middleware('auth')->group(function () {
    Route::get('/beranda', [HomepageController::class, 'index'])->name('beranda');
    Route::get('/produk', [HomepageController::class, 'produk'])->name('produk');
    Route::get('/beli', [HomepageController::class, 'beli'])->name('beli');
    Route::post('/beli/store', [HomepageController::class, 'beliStore'])->name('beli.store');
    Route::get('/infopesanan', [HomepageController::class, 'infopesanan'])->name('infopesanan');
    Route::get('/tentangkami', [HomepageController::class, 'tentangkami'])->name('tentangkami');

    Route::get('/checkout', [HomepageController::class, 'checkout'])->name('checkout');
});



require __DIR__ . '/auth.php';
