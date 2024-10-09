<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomepageController;

// User
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/homepage', [HomepageController::class, 'index'])->middleware('auth');

// Route::get('/homepage', function () {
//     return view('homepage');
// });

Route::get('/profile', function () {
     return view('profile');
});

require __DIR__.'/customer-auth.php';