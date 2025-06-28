<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripePaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
*/

//Admin Routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/adminProfile', [AdminController::class, 'adminProfile'])->name('adminProfile');
Route::get('/customers', [AdminController::class, 'customers'])->name('customers');
Route::get('/changeUserStatus/{status}/{id}', [AdminController::class, 'changeUserStatus'])->name('changeUserStatus');
Route::get('/changeOrderStatus/{status}/{id}', [AdminController::class, 'changeOrderStatus'])->name('changeOrderStatus');

Route::get('/adminAllproducts', [AdminController::class, 'allproducts'])->name('allproducts');
Route::get('/allorders', [AdminController::class, 'allorders'])->name('allorders');
Route::get('/deleteProduct/{id}', [AdminController::class, 'deleteProduct'])->name('deleteProduct');
Route::POST('/AddNewProduct', [AdminController::class, 'AddNewProduct'])->name('AddNewProduct');
Route::POST('/updateProduct', [AdminController::class, 'updateProduct'])->name('updateProduct');


//Customer Routes
/**
 * Homepage
 */
Route::get('/', [MainController::class, 'welcome'])->name('home');

/**
 * Static Pages
 */
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/product_detail', [MainController::class, 'product_detail'])->name('product_detail');

/**
 * Category Pages
 */
// Route::view('/art', 'art')->name('art');
Route::get('/art', [MainController::class, 'art'])->name('art');
Route::get('/home_decor', [MainController::class, 'home_decor'])->name('home_decor');
// Route::view('/home_decor', 'home_decor')->name('home_decor');
// Route::view('/accessories', 'accessories')->name('accessories');
Route::get('/accessories', [MainController::class, 'accessories'])->name('accessories');
// Route::view('/eco_craft', 'eco_craft')->name('eco_craft');
Route::get('/eco_craft', [MainController::class, 'eco_craft'])->name('eco_craft');

/**
 * Product Routes
 */
Route::get('/products', [MainController::class, 'showProducts'])->name('products');
Route::get('/product/{id}', [MainController::class, 'productDetail'])->name('product.detail');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/filter-products/{type}', [MainController::class, 'filterProducts'])->name('products.filter');

/**
 * Shopping Cart & Orders
 */
Route::get('/shopping_cart', [MainController::class, 'shopping_cart'])->name('shopping_cart');
Route::get('/myOrders', [MainController::class, 'myOrders'])->name('myOrders');
Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
Route::get('/deleteCartItem/{id}', [MainController::class, 'deleteCartItem'])->name('deleteCartItem');
Route::post('/addToCart', [MainController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/update-all', [MainController::class, 'updateAllCart'])->name('cart.updateAll');

/**
 * Stripe Payment Routes
 */
Route::post('/stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
Route::post('/stripe/payment', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

/**
 * Authentication Routes
 */
Route::get('/signup', [MainController::class, 'signup'])->name('signup');
Route::post('/signupUser', [MainController::class, 'signupUser'])->name('signupUser');
Route::get('/signin', [MainController::class, 'signin'])->name('signin');
Route::post('/signinUser', [MainController::class, 'signinUser'])->name('signinUser');
Route::post('/updateUser', [MainController::class, 'updateUser'])->name('updateUser');
Route::get('/signout', [MainController::class, 'signout'])->name('signout');
Route::get('/settings', [MainController::class, 'settings'])->name('settings');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');

// Default Laravel Auth Routes (if using Breeze, Jetstream, etc.)
require __DIR__.'/auth.php';

// Route::get('/products', [MainController::class, 'showProducts']);


