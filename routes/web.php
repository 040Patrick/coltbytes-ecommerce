<?php
declare(strict_types=1);
use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Product\ProductController as AdminProductController;
use App\Http\Controllers\Admin\Product\ProductImageController;
use App\Http\Controllers\Address\AddressController;
use App\Http\Controllers\Admin\User\UserController as AdminUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Phone\PhoneController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route; 


/**
 * GLOBAL ROUTES
 */
Route::get('/', [HomeController::class, 'index'])->name('home');
// Contact
Route::resource('/contact', ContactController::class)->only('index', 'store');
// About
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

/**
 * GUEST ROUTES
 */
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store')->middleware('throttle:login');

    // Register 
    Route::resource('/register', RegisterController::class)->only('index', 'store');    

    // Forgot Password 
    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('/forgot-password', 'request')->name('password.request');
        Route::post('/forgot-password', 'email')->name('password.email');
    });
    // Reset Password 
    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('/reset-password/{token}', 'reset')->name('password.reset');
        Route::post('/reset-password', 'update')->name('password.update');
    });
    
}); 
    
// AUTH ROUTES
Route::middleware('auth')->group(function () {
    Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');

    // Verified
    Route::middleware('verified')->group(function () {
        // Profile
        Route::resource('/profile', ProfileController::class)->only('index', 'update', 'destroy');
        // Account 
        Route::get('/account', [AccountController::class, 'index'])->name('account.index');
        // User
        Route::resource('/user', UserController::class)->except('index', 'store');
        // Phone
        Route::resource('/phone', PhoneController::class)->only('index', 'update', 'destroy', 'store');
        // Adresses
        Route::resource('/addresses', AddressController::class);
        // Products
        Route::resource('/products', ProductController::class)->only('show');

        /**
     * Admin Group
         */
        Route::middleware('admin')->prefix('admin')->group(function () {
            Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
            // Admin product
            Route::resource('/products', AdminProductController::class)->names('admin.products');
            // Product Image
            Route::post('/images/{product}', [ProductImageController::class, 'store'])->name('products.images.store');
            Route::delete('/images/{image}', [ProductImageController::class, 'destroy'])->name('products.images.destroy');
            // Order
            Route::resource('/order', OrderController::class);
            // User
            Route::resource('/users', AdminUserController::class)->names('admin.users');
            // Role 
            Route::resource('/Role', OrderController::class);
        });
    });

    // VERIFY EMAIL
    Route::controller(VerifyEmailController::class)->group(function () {
        Route::get('/email-verify', 'notice')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
        Route::post('/email/verification-notification', 'send')->name('verification.send');
    });
});