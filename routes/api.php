<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminApiController;

Route::post('/login', [LoginController::class, 'loginApi'])->name('loginApi');

<<<<<<< Updated upstream
// Student
Route::middleware(['auth:sanctum'])->group(function (){
=======

Route::post('/profile-hts', [ApiController::class, 'login']);
Route::get('/profile/{id}', [ApiController::class, 'getProfile'])->name('profile.show');
Route::get('/orders/{id}', [ApiController::class, 'viewOrder'])->name('viewOrder');
Route::get('/complaints', [ApiController::class, 'viewComplaints'])->name('viewComplaints');

// Student
Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/profile-hts', [ApiController::class, 'getProfileHts']);
>>>>>>> Stashed changes
    Route::get('/profile', [ApiController::class, 'getProfile']);
    Route::get('/logout', [LoginController::class, 'logoutApi']);
    // Item Order
    Route::post('/order/add-item', [ApiController::class, 'addItem']);
    Route::put('/order/edit-item/{id}', [ApiController::class, 'editItem']);
    Route::delete('/order/delete-item/{id}', [ApiController::class, 'deleteItem']);
    // create order done
    Route::post('/order/done', [ApiController::class, 'doneOrder']);
<<<<<<< Updated upstream
=======

    // Complaints
    Route::post('/complaints/{ordx_id}', [ApiController::class, 'createComplaintOrder']);
>>>>>>> Stashed changes
});

// admin
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/admin/dashboard', [AdminApiController::class, 'getDashboard']);
<<<<<<< Updated upstream
    Route::get('/admin/users', [AdminApiController::class, 'getAllStudent']); 
    Route::get('/admin/orders', [AdminApiController::class, 'getAllOrder']);
    Route::get('/admin/complaints', [AdminApiController::class, 'getAllComplaint']);
    Route::post('/admin/complaints/{id}', [AdminApiController::class, 'responseComplaint']);
=======
    Route::get('/admin/users', [AdminApiController::class, 'getAllStudent']);
    Route::get('/admin/orders', [AdminApiController::class, 'getAllOrder']);
    Route::get('/admin/order/detail/{ordx_id}', [AdminApiController::class, 'getDetailOrder']);
    Route::post('/admin/order/edit-detail/{ordx_id}', [AdminApiController::class, 'addDetailOrder']);
    Route::get('/admin/complaints', [AdminApiController::class, 'getAllComplaints']);
    Route::post('/admin/complaint/feedback/{id}', [AdminApiController::class, 'responseComplaint']);


>>>>>>> Stashed changes
});