<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route: Accessible to all authenticated users
Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Post routes
    Route::post('/posts', [PostController::class, 'store'])
        ->middleware('can:create-posts')
        ->name('posts.store');

    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->middleware('can:edit-posts,post')
        ->name('posts.edit');

    Route::patch('/posts/{post}', [PostController::class, 'update'])
        ->middleware('can:edit-posts,post')
        ->name('posts.update');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])
        ->middleware('can:delete-posts,post')
        ->name('posts.destroy');
});

// Include authentication routes
require __DIR__.'/auth.php';
