<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\OrderController as CustomerOrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;


// Trang chủ và Giỏ hàng
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Route Thanh toán
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

    Route::get('/my-orders', [CustomerOrderController::class, 'index'])->name('user.orders.index');
    Route::get('/my-orders/{id}', [CustomerOrderController::class, 'show'])->name('user.orders.show');
});

// Chatbot AI
Route::get('/chat', [ChatbotController::class, 'index'])->name('chatbot.index');
Route::post('/chat/send', [ChatbotController::class, 'chat'])->name('chatbot.chat');

// Test page
Route::get('/test-page', function () {
    return view('test');
});

// Test Chatbot
Route::get('/test-chatbot', function () {
    return view('test-chatbot');
});

// Showcase new design
Route::get('/showcase', function () {
    return view('showcase');
});

// --- ROUTE ĐĂNG NHẬP / ĐĂNG KÝ ---
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// --- NHÓM ROUTE DÀNH CHO ADMIN (ĐÃ ĐƯỢC BẢO VỆ BỞI MIDDLEWARE 'AUTH') ---
Route::prefix('admin')->middleware('auth')->group(function () {
    // Trang chủ Admin
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Quản lý sản phẩm
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // Quản lý đơn hàng
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.update_status');

    // Quản lý tài khoản
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Cài đặt website
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::put('/settings/update', [SettingController::class, 'update'])->name('admin.settings.update');
});

Route::get('/san-pham/{id}', [ProductController::class, 'show'])->name('product.detail');


// --- ROUTE QUẢN LÝ BÌNH LUẬN ---
// Customer submit review
Route::post('/reviews/store/{productId}', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/create/{productId}', [ReviewController::class, 'create'])->name('reviews.create');
Route::get('/product/{productId}/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/api/reviews/{productId}', [ReviewController::class, 'getReviews'])->name('reviews.api');

// Admin manage reviews
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews.index');
    Route::delete('/reviews/{id}', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');
    Route::get('/reviews/edit/{id}', [AdminReviewController::class, 'edit'])->name('admin.reviews.edit');
    Route::put('/reviews/{id}', [AdminReviewController::class, 'update'])->name('admin.reviews.update');
});
