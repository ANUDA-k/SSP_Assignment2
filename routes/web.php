<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TopAdController;
use App\Http\Controllers\BottomAdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ForSaleController;
use App\Http\Controllers\ForRentController;
use App\Http\Controllers\UpcomingController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AgencyController;
use App\Livewire\ForSaleProfile;
use App\Livewire\ForRentProfile;
use App\Http\Middleware\AdminMiddleware;

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Us Page
Route::get('/aboutus', [AboutUsController::class, 'show'])->name('about');
Route::post('/aboutus', [AboutUsController::class, 'subscribe'])->name('about.subscribe');

// Post Ad Page
Route::get('/post-ad', [AdController::class, 'create'])->name('ads.create');
Route::post('/post-ad', [AdController::class, 'store'])->name('ads.store');

// Property Listings
Route::get('/forsale', [ForSaleController::class, 'index'])->name('forsale');
Route::get('/forrent', [ForRentController::class, 'index'])->name('forrent');
Route::get('/forrent/{id}', [ForRentController::class, 'show'])->name('rent.show');
Route::get('/upcoming', [UpcomingController::class, 'index'])->name('upcoming');

// Agency CRUD
Route::resource('agencies', AgencyController::class);
Route::post('/admin/agencies/{id}/add-to-upcoming', [AgencyController::class, 'addToUpcoming'])->name('agencies.addToUpcoming');

// Ad Banners (Top & Bottom)
Route::post('/topads', [TopAdController::class, 'store'])->name('topads.store');
Route::post('/bottomads', [BottomAdController::class, 'store'])->name('bottomads.store');

Route::get('/admin/bottom-ad', [BottomAdController::class, 'index'])->name('admin.bottomad');
Route::delete('/bottom-ad/{id}', [BottomAdController::class, 'destroy'])->name('delete.bottom.ad');
Route::post('/bottom-ad/{id}/set', [BottomAdController::class, 'setAsBottom'])->name('set.bottom.ad');

// Livewire Property Profiles
Route::get('/for-sale-profile/{property}', ForSaleProfile::class)->name('forSaleProfile');
Route::bind('property', function ($value) {
    // Check current route to decide which model to bind
    if (request()->routeIs('forSaleProfile')) {
        return \App\Models\Sale::findOrFail($value);
    }
    if (request()->routeIs('forRentProfile')) {
        return \App\Models\Rent::findOrFail($value);
    }
    abort(404);
});
Route::get('/for-rent-profile/{property}', ForRentProfile::class)->name('forRentProfile');

// Sanctum Authenticated User Profile Page
Route::middleware(['auth:sanctum', 'verified'])->get('/profile', fn() => view('user-profile'))->name('profile');

// Admin Middleware Protected
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::delete('/admin/{table}/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

// Regular User Dashboard
Route::middleware(['auth', 'user'])->group(function () {
   
});

// Register middleware alias for admin (optional if not done in Kernel)
app('router')->aliasMiddleware('admin', AdminMiddleware::class);

//new part
Route::middleware(['auth'])->group(function () {
    Route::get('/post-ad', [AdController::class, 'create'])->name('ads.create');
    Route::post('/post-ad', [AdController::class, 'store'])->name('ads.store');
});