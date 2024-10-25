<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'home'])->name('home');

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
    Route::get('/create-blog', [BlogController::class, 'add'])->name('blog.add');
    Route::post('/create-blog', [BlogController::class, 'add_post'])->name('blog.add');
    Route::get('/view-blog', [BlogController::class, 'view'])->name('blog.view');
    Route::delete('/delete-blog/{id}', [BlogController::class, 'delete'])->name('delete.blog');
    Route::get('/blog-trash', [BlogController::class, 'trash'])->name('trash.blog');
    Route::get('/restore-blog/{id}', [BlogController::class, 'restore'])->name('restore.blog');
    Route::delete('/delete-blog-forever/{id}', [BlogController::class, 'delete_forever'])->name('delete.blog.forever');
});


Route::group(['middleware' => 'role:admin'], function () {
    Route::get('pending', [BlogController::class, 'pending'])->name('pending');
    Route::get('approve_blog/{id}', [BlogController::class, 'approve_blog'])->name('approve.blog');
    Route::post('reject', [BlogController::class, 'reject'])->name('blog.reject');
});


Route::get('/post/{title}', [homeController::class, 'view_post'])->name('view.post');
Route::post('/search', [homeController::class, 'search'])->name('search');
Route::get('/writers', [homeController::class, 'writers'])->name('writers');
Route::get('/user-blogs/{name}', [homeController::class, 'user_blogs'])->name('user.blogs');
Route::get('fetch-blog/{id}', [BlogController::class, 'get_reason'])->name('blog.reason');
Route::get('submit-review/{id}', [BlogController::class, 'review'])->name('review');
