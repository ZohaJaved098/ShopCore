<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavoriteBlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'featured']);


Route::get('blogs', [BlogController::class, 'index']);
Route::get('products', [ProductController::class, 'index']);

// authenticated
Route::middleware('auth')->group(function () {

    Route::get('/profile', [UserController::class, 'profile']);
    Route::patch('/profile', [UserController::class, 'update']);
    Route::delete('/user', [UserController::class, 'delete']);


    Route::middleware('can:access-dashboard')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard']);
        Route::get('/dashboard/blogs', [UserController::class, 'blogsDashboard']);
        Route::get('/dashboard/products', [UserController::class, 'productsDashboard']);
        Route::get('/dashboard/users', [UserController::class, 'usersDashboard']);
        Route::patch('/users/{user}/make-manager', [UserController::class, 'makeManager']);
        Route::patch('/users/{user}/make-user', [UserController::class, 'makeUser']);
    });

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::patch('/cart/{cart}/quantity', [CartController::class, 'update']);

    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::post('/wishlist/add/{product}', [WishlistController::class, 'store']);
    Route::delete('/wishlist/{wishlist}', [WishlistController::class, 'destroy']);
    Route::delete('/wishlist/remove/{product}', [WishlistController::class, 'removeByProduct']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/checkout', [OrderController::class, 'store']);

    Route::resource('blogs', BlogController::class)->except('index');
    Route::resource('products', ProductController::class)
        ->except('index')
        ->middleware('can:manage-products');


    Route::get('/favorite-blogs', [FavoriteBlogController::class, 'index']);
    Route::post('/favorite-blogs/{blog}', [FavoriteBlogController::class, 'store']);
    Route::delete('/favorite-blogs/{blog}', [FavoriteBlogController::class, 'destroy']);

    Route::post('/contact/send', [ContactController::class, 'send']);

});
Route::get('/authors', [BlogController::class, 'authors']);

// ADDED FOOTER PAGES
Route::view('/about-us', 'pages.about');
Route::view('/careers', 'pages.careers');
Route::view('/our-team', 'pages.team');
Route::view('/locations', 'pages.locations');
Route::view('/testimonials', 'pages.testimonials');

Route::view('/privacy-policy', 'pages.privacy');
Route::view('/terms-and-conditions', 'pages.terms');
Route::view('/refund-policy', 'pages.refund');
Route::view('/return-policy', 'pages.return');
Route::view('/warranty-policy', 'pages.warranty');
Route::view('/ai-policy', 'pages.ai-policy');

Route::view('/faqs', 'pages.faqs');
Route::view('/order-tracking', 'pages.order-tracking');
// Route::view('/returns-exchanges', 'pages.returns');
Route::view('/payment-methods', 'pages.payments');
Route::view('/shipping-policy', 'pages.shipping');

Route::view('/become-seller', 'pages.seller');

// done
Route::middleware('guest')->group(function () {
    // need to add permissons roles
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');
