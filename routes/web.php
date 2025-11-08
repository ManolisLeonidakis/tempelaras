<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Blog management routes.
    Route::get('/profile/blog', [BlogController::class, 'blog'])->name('profile.blog');
    Route::get('/posts/create', [BlogController::class, 'create'])->name('posts.create');
    Route::post('/posts', [BlogController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [BlogController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}', [BlogController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [BlogController::class, 'destroy'])->name('posts.destroy');

    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/{user}/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
Route::post('/wishlist/{user}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::delete('/wishlist/{user}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('/wishlist/count', [WishlistController::class, 'count'])->name('wishlist.count');

Route::get('/posts', [BlogController::class, 'index'])->name('posts.index');

Route::get('/posts/{post:slug}', [BlogController::class, 'show'])->name('posts.show');

Route::get('/authors/{user}', [BlogController::class, 'index'])->name('author');

Route::get('/vrikes-mastora', [FindController::class, 'index'])->name('find');

Route::get('/vrikes-mastora/{user}', [FindController::class, 'show'])->name('find.show');

Route::post('/cookie-consent', function (Illuminate\Http\Request $request) {
    $request->validate([
        'consent' => 'required|in:accepted,rejected',
        'necessary' => 'boolean',
        'analytics' => 'boolean',
        'marketing' => 'boolean',
    ]);

    // Store consent in session.
    session(['cookie_consent' => $request->consent]);

    // You can also store in database if needed for logged-in users.
    /*
    if (auth()->check()) {
        auth()->user()->update(['cookie_consent' => $request->consent]);
    }
    */

    return response()->json(['success' => true]);
})->name('cookie.consent');

require __DIR__.'/auth.php';
