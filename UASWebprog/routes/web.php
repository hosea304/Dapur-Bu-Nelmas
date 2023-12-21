<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\PerDayMenuController;
use App\Http\Controllers\OrderController;
use App\Models\Order_line;
use App\Models\User;
use App\Models\Carts;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Models\Foods;
use App\Models\PerDayMenu;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    if (auth()->user()->usertype === 'admin') {
        $totalPenghasilan = Order_line::sum('harga');
        $totalOrders = Order_line::count();
        $totalUser = User::count() - 1;
        $totalMenu = Foods::count();
        return view('backend.dashboard.index', compact('totalPenghasilan', 'totalOrders', 'totalUser', 'totalMenu'));
    } else {
        return redirect('/beranda');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/perday', [DashboardController::class, 'perday'])->name('dashboard.perday');

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

// orders
Route::middleware('auth')->controller(OrderController::class)->group(function () {
    Route::get('orders', 'index')->name('orders');
    Route::get('orders/fetch', 'fetchFoods')->name('orders.fetch');
    Route::get('orders/detail', 'fetchDetail')->name('orders.detail');
    Route::post('orders/changestatus', 'changestatus')->name('orders.changestatus');
});

Route::get('403', function () {
    abort(403);
})->name('403');

Route::get('/akun', function () {
    return view('user.akun');
})->name('akun');


Route::middleware('auth')->group(function () {
    Route::get('/beranda', [HomepageController::class, 'index'])->name('beranda');
    Route::get('/produk', [HomepageController::class, 'produk'])->name('produk');
    Route::get('/beli', [HomepageController::class, 'beli'])->name('beli');
    Route::post('/beli/store', [HomepageController::class, 'beliStore'])->name('beli.store');
    Route::get('/tentangkami', [HomepageController::class, 'tentangkami'])->name('tentangkami');

    Route::get('/cart', function () {
        $user = Auth::user();
        $jumlahDataCart = Carts::where("user_id", Auth::id())
            ->where("checked_out", false)
            ->whereDay("carts.created_at", now()->day)
            ->count();
        return view('user.cart.index', compact('user', 'jumlahDataCart'));
    })->name('cart');
    Route::post('/addtocart', [HomepageController::class, 'addtocart'])->name('addtocart');
    Route::post('/removefromcart', [HomepageController::class, 'removefromcart'])->name('removefromcart');

    Route::get('/getcart', [HomepageController::class, 'getcart'])->name('getcart');
    Route::get('/getsubtotal', [HomepageController::class, 'getsubtotal'])->name('getsubtotal');
    Route::post('/checkoutcart', [HomepageController::class, 'checkoutcart'])->name('checkoutcart');

    Route::get('/getDirectCheckout', [HomepageController::class, 'getDirectCheckout'])->name('getDirectCheckout');
    Route::get('/directCheckout', [HomepageController::class, 'directCheckout'])->name('directCheckout');



    Route::get('/infopesanan', [HomepageController::class, 'infopesanan'])->name('infopesanan');
    Route::get('/checkout', [HomepageController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/store', [HomepageController::class, 'checkoutStore'])->name('checkout.store');
});



require __DIR__ . '/auth.php';
