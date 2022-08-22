<?php

declare(strict_types=1);

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckLoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
Route::get('/', [CheckLoginController::class, 'checkUserType'])->middleware('auth');

// Route::get('/', fn () => view('welcome'));

Route::get('/admin/home', fn () => view('home'))->name('admin.home');

Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

Route::prefix('admin')->group(function (): void {
    Route::prefix('categories')->group(function (): void {
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::get('/index', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    });

    Route::prefix('menus')->group(function (): void {
        Route::get('/', [MenuController::class, 'index'])->name('menus.index');
        Route::get('/create', [MenuController::class, 'create'])->name('menus.create');
        Route::post('/store', [MenuController::class, 'store'])->name('menus.store');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('menus.edit');
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('menus.update');
        Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('menus.delete');
    });

    Route::prefix('products')->group(function (): void {
        Route::get('/', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('products.edit');
        Route::post('/update/{id}', [AdminProductController::class, 'update'])->name('products.update');
        Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->name('products.delete');
    });

    Route::prefix('users')->group(function (): void {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    });

    Route::prefix('roles')->group(function (): void {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
    });
});

Route::get('/dashboard', fn () => view('dashboard'))->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
