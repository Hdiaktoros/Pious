<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserRoleIsAllowedToAccess;

// Default landing page
Route::get('/', function () {
    return view('welcome');
});

// Common middleware for authenticated users
$commonMiddleware = [
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
];

// Dashboard for all verified users
Route::middleware($commonMiddleware)->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin-specific routes with admin role check
Route::middleware(array_merge($commonMiddleware, [EnsureUserRoleIsAllowedToAccess::class.':admin']))->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/admin/users', function () {
        // You might need a controller to handle listing, creating, and editing users
        return view('admin.users.index');
    })->name('users.index');
});

// User-specific routes with user role check
Route::middleware(array_merge($commonMiddleware, [EnsureUserRoleIsAllowedToAccess::class.':user']))->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});
