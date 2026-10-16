<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// استدعاء المتحكمات الأساسية
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;

// استدعاء متحكمات لوحة الإدارة
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes - مسارات المتجر والموقع العام
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{product:slug}', [MenuController::class, 'show'])->name('menu.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/items', [CartController::class, 'store'])->name('cart.store');
Route::patch('/cart/items/{key}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/items/{key}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('throttle:10,1')->name('checkout.store');

Route::get('/orders/track/{token}', [OrderController::class, 'track'])->name('orders.track');

/*
|--------------------------------------------------------------------------
| Admin Routes - مسارات لوحة التحكم والإدارة
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('categories', AdminCategoryController::class)->except(['show']);
    Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.status');
});

/*
|--------------------------------------------------------------------------
| Auth Routes - مسار الدخول المباشر وتسجيل الخروج
|--------------------------------------------------------------------------
*/

// مسار تسجيل دخول المدير (ينشئ الحساب ويسجل الدخول فوراً)
Route::get('/login', function () {
    $admin = User::firstOrCreate(
        ['email' => 'admin@coffeehouse.com'],
        [
            'name' => 'مدير النظام',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]
    );

    if (!$admin->is_admin) {
        $admin->update(['is_admin' => true]);
    }

    Auth::login($admin);
    return redirect()->route('admin.dashboard');
})->name('login');

// مسار تسجيل الخروج
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');