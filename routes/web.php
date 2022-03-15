<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserOrderController;
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

Route::get('/', [ShopController::class, 'index'])->name('home');

Route::get('/cart', function () {
    return view('cart.index');
})->name('cart');

Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::middleware(['auth:sanctum'])->get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::middleware(['auth:sanctum'])->post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.place_order');
Route::middleware(['auth:sanctum'])->get('/checkout/success/{id}', [CheckoutController::class, 'success'])->name('checkout.success');
Route::middleware(['auth:sanctum'])->get('/user/orders', [UserOrderController::class, 'userOrders'])->name('profile.orders');
Route::middleware(['auth:sanctum'])->get('/user/orders/{id}', [UserOrderController::class, 'showUserOrder'])->name('profile.orders.show');
