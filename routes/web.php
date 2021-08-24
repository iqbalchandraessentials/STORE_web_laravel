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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'detail'])->name('categories-detail');

Route::get('/detail/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail-product');
Route::post('/details/{id}', [App\Http\Controllers\DetailController::class, 'add'])->name('detail-add');


Route::get('/cart/success', [App\Http\Controllers\CartController::class, 'success'])->name('success-transaction');


Route::post('/checkout/callback', [App\Http\Controllers\CheckoutController::class, 'callback'])->name('midtrans-callback');


Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('success-register');


// admin
// Route::get('/admin', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard-admin');
// Route::get('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category-admin');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart-delete');

    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout');

    // dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // dashboard Product
    Route::get('/dashboard/product', [App\Http\Controllers\DashboardController::class, 'product'])->name('dashboard-product');
    Route::get('/dashboard/product/{id}', [App\Http\Controllers\DashboardController::class, 'detail'])->name('dashboard-product-detail');
    Route::post('/dashboard/products/{id}', [App\Http\Controllers\DashboardController::class, 'update'])->name('dashboard-product-update');
    Route::get('/dashboard/create', [App\Http\Controllers\DashboardController::class, 'add'])->name('dashboard-create');
    Route::post('/dashboard/udate', [App\Http\Controllers\DashboardController::class, 'create'])->name('dashboard-product-store');


    Route::post('dashboard/products/gallery/upload', [App\Http\Controllers\DashboardController::class, 'uploadGallery'])->name('dashboard-product-gallery-upload');
    Route::get('dashboard/products/gallery/delete/{id}', [App\Http\Controllers\DashboardController::class, 'deleteGallery'])->name('dashboard-product-gallery-delete');


    Route::get('/dashboard/transaction', [App\Http\Controllers\DashboardController::class, 'transaction'])->name('dashboard-transaction');

    Route::get('/dashboard/transaction/{id}', [App\Http\Controllers\DashboardController::class, 'transactionDetail'])->name('dashboard-transaction-detail');

    Route::get('/dashboard/setting', [App\Http\Controllers\DashboardController::class, 'store'])->name('dashboard-setting');
    Route::get('/dashboard/account', [App\Http\Controllers\DashboardController::class, 'account'])->name('dashboard-account');
    Route::post('/dashboard/setting/{redirect}', [App\Http\Controllers\DashboardController::class, 'updateAccount'])->name('dashboard-setting-redirect');
});


Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'AdminDashboardController@index')->name('dashboard-admin');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
    });
