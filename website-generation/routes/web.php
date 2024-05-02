<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

// Landing Page Route
Route::get('/', [LandingPageController::class, 'index'])->name('landing.page');

// Authentication Routes with Email Verification
//Auth::routes(['verify' => true]);

// Routes accessible only to authenticated and verified users
Route::middleware(['auth', 'verified'])->group(function () {
    // User Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Admin Panel Routes, accessible only by users with the 'admin' role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Admin Dashboard
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        // user management
        Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
        Route::get('admin/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('admin/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    });
});

// Dynamic Sites Routing
Route::get('/{siteName}/{page?}', function ($siteName, $page = 'index') {
    // Normalize the page parameter to prevent directory traversal
    $page = trim($page, '/');
    $page = str_replace('.', '', $page);  // Remove periods to avoid file path manipulation

    // Construct the view path
    $viewPath = "sites.$siteName." . str_replace('/', '.', $page);

    // Check if the view exists
    if (View::exists($viewPath)) {
        return view($viewPath);
    } else {
        abort(404); // Handle missing pages appropriately
    }
})->where('siteName', '^[a-zA-Z0-9_-]+$') // Restrict siteName to safe characters
->where('page', '.*');  // Allow for nested directories in the page path

