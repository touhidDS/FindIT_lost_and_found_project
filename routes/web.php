<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Admin\AdminController;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login',     [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login',    [LoginController::class, 'login']);
    Route::get('/register',  [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')->middleware('auth');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/',                [HomeController::class, 'index'])->name('home');
    Route::get('/items/create',    [ItemController::class, 'create'])->name('items.create');
    Route::post('/items',          [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{item}',    [ItemController::class, 'show'])->name('items.show');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
});

// Admin routes
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard',                        [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/items',                            [AdminController::class, 'items'])->name('items');
    Route::get('/users',                            [AdminController::class, 'users'])->name('users');
    Route::delete('/items/{item}',                  [AdminController::class, 'deleteItem'])->name('items.delete');
    Route::patch('/items/{item}/toggle-status',     [AdminController::class, 'toggleItemStatus'])->name('items.toggle');
    Route::delete('/users/{user}',                  [AdminController::class, 'deleteUser'])->name('users.delete');
    Route::patch('/users/{user}/toggle-role',       [AdminController::class, 'toggleUserRole'])->name('users.toggle');
});