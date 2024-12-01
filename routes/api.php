<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminApiController;

Route::post('/login', [LoginController::class, 'loginApi'])->name('loginApi');

// Student
Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/profile', [ApiController::class, 'getProfile']);
    Route::get('/logout', [LoginController::class, 'logoutApi']);
    // Item Order
    Route::post('/order/add-item', [ApiController::class, 'addItem']);
    Route::put('/order/edit-item/{id}', [ApiController::class, 'editItem']);
    Route::delete('/order/delete-item/{id}', [ApiController::class, 'deleteItem']);
    // create order done
    Route::post('/order/done', [ApiController::class, 'doneOrder']);
});

// admin
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/admin/dashboard', [AdminApiController::class, 'getDashboard']);
    Route::get('/admin/users', [AdminApiController::class, 'getAllStudent']); 
    Route::get('/admin/orders', [AdminApiController::class, 'getAllOrder']);
    Route::get('/admin/complaints', [AdminApiController::class, 'getAllComplaint']);
    Route::post('/admin/complaints/{id}', [AdminApiController::class, 'responseComplaint']);
});