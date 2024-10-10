<?php

use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     $arr = ['HTML', 'CSS', 'JS', 'PHP', 'MYSQL', 'LARAVEL'];
//     return view('welcome', ['languages' => $arr, 'framework'  => 'laravel']);
// });

Route::get('/', [HomeController::class, 'home']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::resource('/dashboard', DashboardController::class);


Route::get('/posts', [PostController::class, 'show']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/update', [PostController::class, 'update']);
Route::get('/posts/delete', [PostController::class, 'delete']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('create.form');
    Route::post('/teacher/create', [TeacherController::class, 'upload'])->name('create.upload');
    Route::delete('/teachers/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.delete');
    Route::get('/teachers/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('teachers/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register_post'])->name('register.post');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/home', function () {
//     return '<h1>Home Page!</h1>';
// });


// Route::get('/new-page', function () {
//     return '<h1>New Page!</h1>';
// });

// extensions
// PHP namespace resolver
// Laravel Snippets
// Laravel Intellisense
// laravel blade spacer
// Laravel Extra Intellisense
// Laravel blade snippets
// Laravel blade formatter