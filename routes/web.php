<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Controllers\FrontendController;

// User

// --- GET ---
// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);
// Route::get('/homepage', [FrontendController::class, 'homepage'])->middleware(StudentMiddleware::class)->name('homepage');
// // Route::get('/order', [FrontendController::class, 'order'])->middleware(StudentMiddleware::class)->name('order');
// Route::get('/profile', [FrontendController::class, 'profile'])->middleware(StudentMiddleware::class)->name('profile');
// Route::get('/complaint', [FrontendController::class, 'complaint'])->middleware(StudentMiddleware::class)->name('complaint');
// Route::get('/notification', [FrontendController::class, 'notification'])->middleware(StudentMiddleware::class)->name('notification');
// Route::get('/tracking', [FrontendController::class, 'track'])->middleware(StudentMiddleware::class)->name('tracking');
// Route::get('/finance', [FrontendController::class, 'finance'])->middleware(StudentMiddleware::class)->name('finance');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => StudentMiddleware::class], function () {
    Route::get('/homepage', [FrontendController::class, 'homepage'])->name('homepage');
    // Route::get('/profile', [FrontendController::class, 'profile'])->name('profile');
    Route::get('/complaint', [FrontendController::class, 'complaint'])->name('complaint');
    Route::get('/notification', [FrontendController::class, 'notification'])->name('notification');
    Route::get('/tracking', [FrontendController::class, 'track'])->name('tracking');
    Route::get('/finance', [FrontendController::class, 'finance'])->name('finance');
});

// --- POST ---
Route::post('/complaint', [FrontendController::class, 'createComplaint'])->middleware(StudentMiddleware::class)->name('complaint.create');


// Order 
Route::get('/order', [FrontendController::class, 'order'])->middleware(StudentMiddleware::class)->name('order');
Route::post('/order', [FrontendController::class, 'addItem'])->middleware(StudentMiddleware::class)->name('add.item');
Route::post('/order/edit/{id}', [FrontendController::class, 'editItem'])->middleware(StudentMiddleware::class)->name('edit.item');
Route::post('/order/done', [FrontendController::class, 'orderDone'])->middleware(StudentMiddleware::class)->name('order.done');
Route::get('/order/items', [FrontendController::class, 'showOrderItems'])->middleware(StudentMiddleware::class)->name('show.order.items');
Route::post('/order/delete/{id}', [FrontendController::class, 'deleteItem'])->middleware(StudentMiddleware::class)->name('delete.item');


// profile
Route::get('/profile', [FrontendController::class, 'profile'])->middleware(StudentMiddleware::class)->name('profile');
Route::post('/profile/edit', [FrontendController::class, 'editProfile'])->middleware(StudentMiddleware::class)->name('edit.profile');




// Admin Route
Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->middleware(AdminMiddleware::class)->name('admin_dashboard')->controllerMiddleware('admin');
Route::get('/admin-user', [AdminController::class, 'admin_user'])->middleware(AdminMiddleware::class)->name('admin_user')->controllerMiddleware('admin');
Route::get('/admin-order', [AdminController::class, 'admin_order'])->middleware(AdminMiddleware::class)->name('admin_order')->controllerMiddleware('admin');
Route::get('/admin-complaint', [AdminController::class, 'admin_complaint'])->middleware(AdminMiddleware::class)->name('admin_complaint')->controllerMiddleware('admin');



// API HAPI js
Route::get('/data', [ApiController::class, 'showData']);
