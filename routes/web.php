<?php

use Illuminate\Support\Facades\Route;

// ================== Controllers ==================

// Profile
use App\Http\Controllers\ProfileController;

// Frontend
use App\Http\Controllers\Frontend\{
    HomeController,
    ProductController as FrontendProductController,
    CartController,
    BrandController as FrontendBrandController,
    CategoryController as FrontendCategoryController,
    ConsultationController,
    RideBookingController,
    MaintenanceBookingController,
    EventController as FrontendEventController
};
use App\Http\Controllers\CheckoutController;

// Customer
use App\Http\Controllers\Customer\Auth\{
    LoginController as CustomerLoginController,
    RegisterController
};
use App\Http\Controllers\Customer\{
    DashboardController,
    OrderController,
    ProfileController as CustomerProfileController,
    EventController as CustomerEventController
};

// Admin
use App\Http\Controllers\Admin\{
    BrandController as AdminBrandController,
    ProductController as AdminProductController,
    CategoryController as AdminCategoryController,
    Auth\LoginController as AdminLoginController,
    OrderController as AdminOrderController,
    CustomerController,
    ConsultationController as AdminConsultationController,
    RideBookingController as AdminRideBookingController,
    EventController as AdminEventController,
    EventRegistrationController
};

// ================== Public Routes ==================
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products
Route::prefix('products')->group(function () {
    Route::get('/', [FrontendProductController::class, 'index'])->name('frontend.products.index');
    Route::get('{slug}', [FrontendProductController::class, 'show'])->name('frontend.products.show');
});

// Cart
Route::prefix('cart')->group(function () {
    Route::post('add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::view('/', 'frontend.cart')->name('cart');
});

// Checkout
Route::get('checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

// Brands & Categories
Route::get('brands', [FrontendBrandController::class, 'index'])->name('brands');
Route::get('categories', [FrontendCategoryController::class, 'index'])->name('categories');

// Static Pages
Route::view('about', 'frontend.about')->name('about');
Route::view('terms', 'frontend.terms')->name('terms');
Route::view('privacy', 'frontend.privacy')->name('privacy');

// Consultation
Route::get('request-consultation', fn() => view('frontend.request-consultation'))->name('request.consultation');
Route::post('request-consultation', [ConsultationController::class, 'store'])->name('request.consultation.store');

// Ride Booking
Route::view('ride-booking', 'frontend.ride')->name('ride');
Route::post('ride-booking', [RideBookingController::class, 'store'])->name('ride.store');

// Maintenance Booking
Route::get('maintenance-booking', fn() => view('frontend.maintenance'))->name('maintenance');
Route::post('maintenance-booking', [MaintenanceBookingController::class, 'store'])->name('maintenance.store');

// Events (Frontend)
Route::prefix('events')->group(function () {
    Route::get('/', [FrontendEventController::class, 'index'])->name('events');
    Route::get('{id}', [FrontendEventController::class, 'show'])->name('event.single');
    Route::post('{id}/register', [FrontendEventController::class, 'register'])->name('event.register');
});

// routes/web.php or api.php
Route::post('/event-location/store', [EventLocationController::class, 'store'])->name('event-location.store');


use App\Http\Controllers\Frontend\EventLocationController;

Route::middleware('auth:customer')->group(function () {
    Route::post('/event/{id}/update-location', [EventLocationController::class, 'update'])->name('event.update-location');
});

// routes/web.php (or routes/admin.php if you have separate admin routes)
use App\Http\Controllers\Admin\EventMapController;



// ================== Customer Routes ==================
Route::prefix('customer')->name('customer.')->group(function () {

    // Guest Routes
    Route::middleware('guest:customer')->group(function () {
        Route::get('login', [CustomerLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [CustomerLoginController::class, 'login'])->name('login.post');
        Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register'])->name('register.post');
    });

    // Authenticated Customer Routes
    Route::middleware('auth:customer')->group(function () {
        Route::post('logout', [CustomerLoginController::class, 'logout'])->name('logout');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('orders', [OrderController::class, 'index'])->name('orders');
        Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');

        Route::prefix('profile')->group(function () {
            Route::get('edit', [CustomerProfileController::class, 'edit'])->name('profile.edit');
            Route::post('update', [CustomerProfileController::class, 'update'])->name('profile.update');
        });

        Route::get('events', [CustomerEventController::class, 'index'])->name('events');
    });
});

// ================== Authenticated User Profile ==================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// ================== Admin Routes ==================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    Route::resources([
        'products' => AdminProductController::class,
        'orders' => AdminOrderController::class,
        'customers' => CustomerController::class,
        'brands' => AdminBrandController::class,
        'categories' => AdminCategoryController::class,
        'events' => AdminEventController::class,
    ]);
    Route::get('events/{id}/map', [EventMapController::class, 'show'])->name('events.map');
    Route::get('consultations', [AdminConsultationController::class, 'index'])->name('consultations.index');
    Route::get('ride-bookings', [AdminRideBookingController::class, 'index'])->name('ride-bookings.index');
    Route::get('event-registrations', [EventRegistrationController::class, 'index'])->name('event-registrations.index');
});

require __DIR__.'/auth.php';
