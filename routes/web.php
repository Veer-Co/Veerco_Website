<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhonePecontroller;

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

// Route::get('/', function () {
//     return view('home');
// });

// Route::view('signin', 'auth/login');
// Route::view('signup', 'auth/signup');
Route::get('/', [MainController::class, 'home']);
Route::get('getCategory', [MainController::class, 'getCategory'])->name('getCategory');
Route::get('getBrand', [MainController::class, 'getBrand'])->name('getBrand');
Route::get('products', [ProductController::class, 'productView'])->name('products');
// Route::get('{slugfor}/{slug}', [SearchController::class, 'productView'])->name('products.{slugfor}.{slug}');

Route::get('/category/{slug}', [SearchController::class, 'listingByCategory'])->name('products.category');
Route::get('/get_filtered_products', [SearchController::class, 'get_filtered_products'])->name('get_filtered_products');



Route::get('products/{slugfor}/{slug}', [ProductController::class, 'productView'])->name('products.{slugfor}.{slug}');
Route::get('products-details/{slug}', [ProductController::class, 'productDetails'])->name('products-details.{slug}');
Route::get('category', [MainController::class, 'categories_show'])->name('category');
Route::get('brands', [MainController::class, 'show_brands'])->name('brands');
Route::view('user/dashboard', 'dashboard/dashboard');
Route::view('privacy/policy', 'privacy-policy');
Route::view('term/condition', 'term-condition');

Route::view('user/payment-method', 'dashboard/payment-method');
Route::view('user/add-payment-method', 'dashboard/add-payment-method');
Route::view('user/fetch-bank_name', 'dashboard/fetch-bank_name');
// Route::view('user/user-details', 'dashboard/user-details');
Route::view('user/change-password', 'dashboard/change-password');
Route::post('product_rating', [MainController::class, 'productRating'])->name('product_rating');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::view('return/policy', 'return-policy');
Route::view('shipping/policy', 'shipping-policy');

Route::post('addtocart', [MainController::class, 'addtocart'])->name('addtocart');
Route::post('adonaddtocart', [MainController::class, 'adonaddtocart'])->name('adonaddtocart');
Route::get('cart', [MainController::class, 'shoppingCart'])->name('cart');
Route::post('delete-cart-item', [MainController::class, 'deleteCartItem'])->name('delete-cart-item');
Route::post('update-quantity', [MainController::class, 'updateQuantity'])->name('update-quantity');
Route::post('buynow', [MainController::class, 'buyNow'])->name('buynow');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('search', [MainController::class, 'search'])->name('search');
Route::get('getsearch', [MainController::class, 'search'])->name('getsearch');
Route::get('search', [MainController::class, 'searchList'])->name('search');

Route::post('user/addAddressGuest', [DashboardController::class, 'storeGuestAddress'])->name('user.addAddressGuest');

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');

require __DIR__.'/admin.php';
Route::view('profile', 'profile');

Route::get('phonepe', [PhonePecontroller::class, 'phonePe'])->name('phonePe');
Route::post('phonepe-response', [PhonePecontroller::class, 'response'])->name('response');
