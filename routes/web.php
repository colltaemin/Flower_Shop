<?php

declare(strict_types=1);

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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
Route::get('/login', 'CheckLoginController@checkLogin');

Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('index');

Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

Route::get('/theme', fn () => view('pages.theme'))->name('theme');

Route::get(
    '/carts',
    function () {
        $products = [];
        $carts = Session::get('cart', []);
        foreach ($carts as $cart) {
            $products = array_merge($products, [Product::findOrFail($cart['id'])]);
        }

        return view('pages.carts', compact('products'));
    }
)->name('carts');

Route::get('/order', fn () => view('pages.order'))->name('order');

Route::get('/momoCheck', [OrderController::class, 'momoCheck'])->name('momoCheck');

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/category/{id}', [HomeController::class, 'category'])->name('category');

Route::get('/product/{product}', [HomeController::class, 'product'])->name('product');

Route::get('/sendMail', [MailController::class, 'sendMail'])->name('sendMail');

Route::post('/rating{id}', [HomeController::class, 'rating'])->name('rating')->middleware('auth');

Route::prefix('admin')->group(function (): void {
    Route::prefix('categories')->group(function (): void {
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('can:add-category');
        Route::get('/index', [CategoryController::class, 'index'])->name('categories.index')->middleware('can:list-category');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('can:edit-category');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete')->middleware('can:delete-category');
    });

    Route::prefix('menus')->group(function (): void {
        Route::get('/', [MenuController::class, 'index'])->name('menus.index')->middleware('can:list-menu');
        Route::get('/create', [MenuController::class, 'create'])->name('menus.create')->middleware('can:add-menu');
        Route::post('/store', [MenuController::class, 'store'])->name('menus.store');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('menus.edit')->middleware('can:edit-menu');
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('menus.update');
        Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('menus.delete')->middleware('can:delete-menu');
    });

    Route::prefix('products')->group(function (): void {
        Route::get('/', [AdminProductController::class, 'index'])->name('products.index')->middleware('can:list-product');
        Route::get('/create', [AdminProductController::class, 'create'])->name('products.create')->middleware('can:add-product');
        Route::post('/store', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('products.edit')->middleware('can:edit-product');
        Route::post('/update/{id}', [AdminProductController::class, 'update'])->name('products.update');
        Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->name('products.delete')->middleware('can:delete-product');
    });

    Route::prefix('users')->group(function (): void {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete')->middleware('can:delete-user');
        Route::post('/rating', [UserController::class, 'rating'])->name('users.rating')->middleware('auth');
    });

    Route::prefix('roles')->group(function (): void {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
    });

    Route::prefix('orderDetails')->group(function (): void {
        Route::get('/', [OrderController::class, 'index'])->name('orderDetails.index');
        Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('orderDetails.delete');
    });
});

Route::get('/dashboard', fn () => view('dashboard'))->middleware(['auth'])->name('dashboard');

Route::prefix('cart')->controller(CartController::class)->name('cart.')->group(function (): void {
    Route::get('', 'getCart')->name('all');
    Route::post('', 'addProduct')->name('add');
    Route::delete('', 'removeProduct')->name('delete');
    Route::patch('increase', 'increaseQuantity')->name('increase');
    Route::patch('decrease', 'decreaseQuantity')->name('decrease');
});

Route::prefix('orders')->group(function (): void {
    Route::post('/store', [OrderController::class, 'store'])->name('orders.store');
    Route::post('/storeStatus', [OrderController::class, 'storeStatus'])->name('orders.storeStatus');
    Route::get('/listOrder', [OrderController::class, 'listOrder'])->name('orders.listOrder');
});

Route::get('/order-confirm', [OrderController::class, 'show'])->name('order-confrim');

Route::post('/vnpay_payment', [PaymentController::class, 'vnpay_payment'])->name('vnpay_payment');

Route::get('/momo_payment', [PaymentController::class, 'momo_payment'])->name('momo_payment');

require __DIR__.'/auth.php';
