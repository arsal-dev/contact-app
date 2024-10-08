<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeacherController;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

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


Route::get('/teacher/create', [TeacherController::class, 'create'])->name('create.form');
Route::post('/teacher/create', [TeacherController::class, 'upload'])->name('create.upload');

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