<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route to create a website
Route::post('/create-website', [WebsiteController::class, 'createWebsite'])->name('create-website');

// Route to update a website
Route::post('/update-website', [WebsiteController::class, 'updateWebsite'])->name('update-website');

// Route to delete a website
Route::post('/delete-website', [WebsiteController::class, 'deleteWebsite'])->name('delete-website');

Route::get('/websites/create', [WebsiteController::class, 'create'])->name('websites.create')->middleware('auth');
Route::post('/websites', [WebsiteController::class, 'store'])->name('websites.store')->middleware('auth');
