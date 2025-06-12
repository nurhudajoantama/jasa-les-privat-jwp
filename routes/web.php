<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Admin\CatalogController as AdminCatalogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;

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

Route::get('/', [PageController::class, 'index'])->name('home');
Route::view('contact', 'contact')->name('contact');

// Pemesanan / Cek Pesanan (Public)
Route::get('check-orders', [PageController::class, 'showOrderForm'])->name('orders.form');

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Catalog Routes
Route::get('catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('catalog/{course}', [CatalogController::class, 'show'])->name('catalog.show');
Route::post('catalog/{course}/order', [CatalogController::class, 'postOrder'])->name('catalog.order');

// Admin Routes
Route::group([
    'middleware' => ['auth', 'can:admin-access'],
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Catalog Management
    Route::get('catalog', [AdminCatalogController::class, 'index'])->name('catalog.index');
    Route::get('catalog/create', [AdminCatalogController::class, 'create'])->name('catalog.create');
    Route::post('catalog', [AdminCatalogController::class, 'store'])->name('catalog.store');
    Route::get('catalog/{course}/edit', [AdminCatalogController::class, 'edit'])->name('catalog.edit');
    Route::put('catalog/{course}', [AdminCatalogController::class, 'update'])->name('catalog.update');
    Route::delete('catalog/{course}', [AdminCatalogController::class, 'destroy'])->name('catalog.destroy');

    // Order Management
    Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
    // Completed Orders PDF Report (must be before show/update)
    Route::get('orders/report', [AdminOrderController::class, 'report'])->name('orders.report');
    Route::get('orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::put('orders/{order}', [AdminOrderController::class, 'update'])->name('orders.update');
    Route::post('orders/{id}/status', [AdminOrderController::class, 'changeStatus'])->name('orders.changeStatus');

    // Settings Management
    Route::get('settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [AdminSettingController::class, 'update'])->name('settings.update');
});
