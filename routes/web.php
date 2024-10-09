<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomepageController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\StudentMiddleware;

// User
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

<<<<<<< HEAD

Route::get('/homepage', [HomepageController::class, 'index'])->middleware('auth');
=======
// Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage')->middleware('auth:student');

Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage')->middleware(StudentMiddleware::class);

// Admin
Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin-dashboard')->middleware(AdminMiddleware::class);
>>>>>>> 2ed52f1 (Adding Admin UI)

// Route::get('/homepage', function () {
//     return view('homepage');
// });

Route::get('/profile', function () {
<<<<<<< HEAD
     return view('profile');
});

Route::get('/order', function () {
    return view('order');
});

require __DIR__.'/customer-auth.php';
=======
    return view('profile');
});

// Admin Route
Route::get('/admin-dashboard', function () {
    return view('admin_dashboard');
});
Route::get('/admin-order', function () {
    return view('admin_order');
});
Route::get('/admin-user', function () {
    return view('admin_user');
});
Route::get('/admin-complaint', function () {
    return view('admin_complaint');
});
>>>>>>> 2ed52f1 (Adding Admin UI)
