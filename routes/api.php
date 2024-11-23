<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminApiController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'loginApi'])->name('loginApi');

// Student
Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/me', [ApiController::class, 'me']);
    Route::get('/user', [ApiController::class, 'getUser']);
    Route::get('/logout', [LoginController::class, 'logoutApi']);
    // Item Order
    Route::post('/order/add-item', [ApiController::class, 'addItem']);
    Route::put('/order/edit-item/{id}', [ApiController::class, 'editItem']);
    Route::delete('/order/delete-item/{id}', [ApiController::class, 'deleteItem']);
    // create order done
    Route::post('/order/done', [ApiController::class, 'doneOrder']);
});

// Admin
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/admin/dashboard', [AdminApiController::class, 'adminDashboard']);
    Route::get('/admin/users', [AdminApiController::class, 'adminUser']);
    Route::get('/admin/orders', [AdminApiController::class, 'adminOrder']);
    Route::get('/admin/complaints', [AdminApiController::class, 'adminComplaint']);
});



// Route::get('/me', [ApiController::class, 'me'])->middleware('auth:sanctum');
// Route::get('/logout', [LoginController::class, 'logoutApi'])->middleware(['auth:sanctum']);