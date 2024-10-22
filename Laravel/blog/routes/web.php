<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_post'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register_post'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/add-category', [CategoryController::class, 'add'])->name('category.add');
    Route::post('/add-category', [CategoryController::class, 'add_post'])->name('category.add');
    Route::get('/view-category', [CategoryController::class, 'view'])->name('category.view');

    // rotue for blogs
    Route::get('create-blog', [BlogController::class, 'add'])->name('blog.add');
    Route::post('create-blog', [BlogController::class, 'add_post'])->name('blog.add');
    Route::get('view-blog', [BlogController::class, 'view'])->name('blog.view');
});

Route::get('/', [homeController::class, 'home'])->name('home');
