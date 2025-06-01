<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
//new part2
use App\Http\Controllers\Api\PostAdController;
use App\Http\Controllers\Api\SaleApiController;

// Public API routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/sale', [SaleApiController::class, 'index']); // Public route without auth

// Protected API routes using Sanctum
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Authenticated user profile
    Route::get('/profile', function (Request $request) {
        return $request->user();
    });

    //new part
    Route::post('/sale', [SaleApiController::class, 'store']);

    // Admin-only route
    Route::middleware('admin')->get('/admin/dashboard', function () {
        return response()->json(['message' => 'Welcome Admin']);
    });

    // User-only route
    Route::middleware('user')->get('/user/dashboard', function () {
        return response()->json(['message' => 'Welcome User']);
    });

    //new part2
    Route::middleware('auth:sanctum')->post('/sale', [PostAdController::class, 'store']);


});
