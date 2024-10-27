<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Controllers\FrontendController;

// User
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/homepage', [FrontendController::class, 'homepage'])->middleware(StudentMiddleware::class)->name('homepage');
Route::get('/order', [FrontendController::class, 'order'])->middleware(StudentMiddleware::class)->name('order');
Route::get('/profile', [FrontendController::class, 'profile'])->middleware(StudentMiddleware::class)->name('profile');
Route::get('/complaint', [FrontendController::class, 'complaint'])->middleware(StudentMiddleware::class)->name('complaint');
Route::get('/notification', [FrontendController::class, 'notification'])->middleware(StudentMiddleware::class)->name('notification');
Route::get('/tracking', [FrontendController::class, 'track'])->middleware(StudentMiddleware::class)->name('tracking');
Route::get('/finance', [FrontendController::class, 'finance'])->middleware(StudentMiddleware::class)->name('finance');

// Admin Route
Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->middleware(AdminMiddleware::class)->name('admin_dashboard')->controllerMiddleware('admin');
Route::get('/admin-user', [AdminController::class, 'admin_user'])->middleware(AdminMiddleware::class)->name('admin_user')->controllerMiddleware('admin');
Route::get('/admin-order', [AdminController::class, 'admin_order'])->middleware(AdminMiddleware::class)->name('admin_order')->controllerMiddleware('admin');
Route::get('/admin-complaint', [AdminController::class, 'admin_complaint'])->middleware(AdminMiddleware::class)->name('admin_complaint')->controllerMiddleware('admin');
