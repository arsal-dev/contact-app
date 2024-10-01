<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     $arr = ['HTML', 'CSS', 'JS', 'PHP', 'MYSQL', 'LARAVEL'];
//     return view('welcome', ['languages' => $arr, 'framework'  => 'laravel']);
// });

Route::get('/', [HomeController::class, 'home']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::resource('/dashboard', DashboardController::class);

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