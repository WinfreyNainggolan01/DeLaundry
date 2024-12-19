<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TestApiController;
use App\Http\Controllers\AdminApiController;

Route::post('/login', [LoginController::class, 'loginApi'])->name('loginApi');

// Student
Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/profile', [ApiController::class, 'getProfile']);
    Route::get('/logout', [LoginController::class, 'logoutApi']);
    Route::get('/student/orders', [ApiController::class, 'getStudentOrder'])->name('api.getStudentOrder');

    Route::post('/order/item', [ApiController::class, 'addItem'])->name('api.addItem');
    Route::put('/order/item/{id}', [ApiController::class, 'editItem'])->name('api.editItem');
    Route::delete('/order/item/{id}', [ApiController::class, 'deleteItem'])->name('api.deleteItem');
    Route::post('/order/done', [ApiController::class, 'orderDone'])->name('api.orderDone');
    Route::post('/complaint/{ordx_id}', [ApiController::class, 'submitComplaint'])->name('api.submitComplaint');
    Route::put('/profile', [ApiController::class, 'editProfile'])->name('api.editProfile');
});

// admin
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/admin/dashboard', [AdminApiController::class, 'getDashboard']);
    Route::get('/admin/users', [AdminApiController::class, 'getAllStudent']);
    Route::get('/admin/orders', [AdminApiController::class, 'getAllOrder']);
    Route::get('/admin/order/detail/{ordx_id}', [AdminApiController::class, 'getDetailOrder']);
    Route::post('/admin/order/edit-detail/{ordx_id}', [AdminApiController::class, 'addDetailOrder']);
    Route::get('/admin/complaints', [AdminApiController::class, 'getAllComplaints']);
    Route::post('/admin/complaint/feedback/{id}', [AdminApiController::class, 'responseComplaint']);
    Route::get('/feedbacks', [TestApiController::class, 'feedbacks'])->name('api.feedbacks');
    Route::get('/complaints', [TestApiController::class, 'complaints'])->name('api.complaints');
    Route::post('/feedback/{complaint_id}', [TestApiController::class, 'createFeedback'])->name('api.createFeedback');
    Route::put('/feedback/{id}', [TestApiController::class, 'updateFeedback'])->name('api.updateFeedback');
    Route::delete('/feedback/{id}', [TestApiController::class, 'deleteFeedback'])->name('api.deleteFeedback');
    Route::get('/complaint/{id}', [TestApiController::class, 'showComplaint'])->name('api.complaint.show');
    Route::get('/student/{id}', [TestApiController::class, 'showStudent'])->name('api.student.show');
});


// // Admin Login
// Route::post('/admin/login', [TestApiController::class, 'loginApi'])->name('admin.login');

// // Test API Admin Create Feedback
// Route::middleware(['auth:sanctum'])->group(function () {
//     // Get All Feedbacks and Complaints
//     Route::get('/feedbacks', [TestApiController::class, 'feedbacks'])->name('api.feedbacks');
//     Route::get('/complaints', [TestApiController::class, 'complaints'])->name('api.complaints');

//     // Hateoas
//     Route::post('/feedback/{complaint_id}', [TestApiController::class, 'createFeedback'])->name('api.createFeedback');
//     Route::put('/feedback/{id}', [TestApiController::class, 'updateFeedback'])->name('api.updateFeedback');
//     Route::delete('/feedback/{id}', [TestApiController::class, 'deleteFeedback'])->name('api.deleteFeedback');
//     Route::get('/complaint/{id}', [TestApiController::class, 'showComplaint'])->name('api.complaint.show');
//     Route::get('/student/{id}', [TestApiController::class, 'showStudent'])->name('api.student.show');

//     // Logout
//     Route::get('admin/logout', [TestApiController::class, 'logoutApi'])->name('api.logout');
// });