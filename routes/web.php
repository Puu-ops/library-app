<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// การตั้งค่าและการใช้งานของบรรณารักษ์
Route::middleware(['auth', 'verified', 'librarian'])->group(function () {
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

require __DIR__.'/auth.php';

