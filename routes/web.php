<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'detail'])->name('categories-detail');
Route::get('/detail/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail-product');
Route::post('/detail/{id}', [App\Http\Controllers\DetailController::class, 'add'])->name('detail-add');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart-delete');
Route::get('/cart/success', [App\Http\Controllers\CartController::class, 'success'])->name('Success-transaction');

Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout');
Route::post('/checkout/callback', [App\Http\Controllers\CheckoutController::class, 'callback'])->name('midtrans-callback');


Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('Success-register');


// dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('Dashboard');
Route::get('/dashboard/product', [App\Http\Controllers\DashboardController::class, 'product'])->name('Dashboard-Product');
Route::get('/dashboard/product/{id}', [App\Http\Controllers\DashboardController::class, 'detail'])->name('Dashboard-Product-Detail');
Route::get('/dashboard/product/add', [App\Http\Controllers\DashboardController::class, 'add'])->name('Dashboard-Add-Product');
Route::get('/dashboard/transaction', [App\Http\Controllers\DashboardController::class, 'transaction'])->name('Dashboard-Transaction');
Route::get('/dashboard/transaction/{id}', [App\Http\Controllers\DashboardController::class, 'transactionDetail'])->name('dashboard-transaction-detail');
Route::get('/dashboard/account', [App\Http\Controllers\DashboardController::class, 'account'])->name('dashboard-account');
Route::get('/dashboard/store', [App\Http\Controllers\DashboardController::class, 'store'])->name('dashboard-setting');

// admin
// Route::get('/admin', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard-admin');
// Route::get('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category-admin');

Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->group(function () {
        Route::get('/', 'AdminDashboardController@index')->name('dashboard-admin');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
    });



Auth::routes();
