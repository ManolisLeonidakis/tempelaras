<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts', [BlogController::class, 'index'])->name('posts.index');

Route::get('/posts/{post:slug}', [BlogController::class, 'show'])->name('posts.show');

Route::get('/authors/{user}', [BlogController::class, 'index'])->name('author');

Route::get('/vrikes-mastora', [FindController::class, 'index'])->name('find');

Route::get('/vrikes-mastora/{user}', [FindController::class, 'show'])->name('find.show');

require __DIR__ . '/auth.php';
