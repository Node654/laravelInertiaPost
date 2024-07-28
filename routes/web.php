<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PostController::class)->group(function () {
   Route::get('/posts', 'index')->name('posts.index');
   Route::get('/posts/create', 'create')->name('posts.create');
   Route::get('/posts/{post}', 'show')->name('posts.show');
   Route::post('/posts', 'store')->name('posts.store');
});



require __DIR__.'/auth.php';
