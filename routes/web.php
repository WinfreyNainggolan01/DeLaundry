<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AdminDashboardController;

// User
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/homepage', [HomepageController::class, 'index'])->middleware(StudentMiddleware::class);
Route::get('/order', function () {
    return view('order');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/order', function () {
    return view('order');
});
Route::get('/complaint', function () {
    return view('complaint');
});
Route::get('/finance', function () {
    return view('finance');
});
Route::get('/tracking', function () {
    return view('tracking');
});
Route::get('/detail-finance', function () {
    return view('student.detailfinance');
});


// Admin Route
Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->middleware(AdminMiddleware::class)->controllerMiddleware('admin');
// Route::middleware('admin')->group(function () {
//     Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->middleware(AdminMiddleware::class)->name('admin.dashboard');}
// );

// Route::get('/admin-dashboard', function () {
//     return view('admin_dashboard');
// });

Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin-order', function () {
    return view('admin.order');
});
Route::get('/admin-order/fill-order', function () {
    return view('admin_order');
});
Route::get('/admin-order/detail', function () {
    return view('admin_order');
});
Route::get('/admin-user', function () {
    return view('admin.user');
});
Route::get('/admin-complaint', function () {
    return view('admin.complaint');
});





// Route::get('/', function () {
//     return view('home');
// });

route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});


Route::get('/home', function () {
    // return view('home');
    return redirect(('/check'));
});



Route::middleware(['auth'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAccess:2');
    Route::get('/operator', [AdminController::class, 'operator'])->middleware('userAccess:1');
    Route::get('/user', [AdminController::class, 'user'])->middleware('userAccess:0');
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/check', [AdminController::class, 'checkrole']);
});


