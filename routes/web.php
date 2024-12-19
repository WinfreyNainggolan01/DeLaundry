<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Controllers\FrontendController;

// Guest
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

// Admin Route
Route::group(['middleware' => AdminMiddleware::class], function () {
    // Admin Route
    Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard');
    Route::get('/admin-user', [AdminController::class, 'admin_user'])->name('admin_user');

    // Admin Order
    Route::get('/admin-order', [AdminController::class, 'admin_order'])->name('admin_order');
    Route::get('/admin-order/detail/{ordx_id}', [AdminController::class, 'admin_order_detail'])->name('admin.order.detail');
    Route::get('/admin-order/edit/{ordx_id}', [AdminController::class, 'editOrder'])->name('admin_order_edit');
    Route::post('/admin-order/update/{ordx_id}', [AdminController::class, 'admin_order_update'])->name('admin_order_update');;

    // Admin Profile
    Route::get('/admin-profile', [AdminController::class, 'admin_profile'])->name('admin_profile');
    Route::post('/admin-profile/edit', [AdminController::class, 'adminEditProfile'])->name('admin_editProfile');

    // Complaint
    Route::get('/admin-complaint', [AdminController::class, 'adminComplaint'])->name('admin_complaint');
    Route::get('/admin-complaint/feedback/{complaint_id}', [AdminController::class, 'showComplaint'])->name('show.complaint');
    Route::post('/admin-complaint/feedback/{complaint_id}', [AdminController::class, 'createFeedback'])->name('add.feedback');
});


// Student Route
Route::group(['middleware' => StudentMiddleware::class], function (){
    // General
    Route::get('/homepage', [FrontendController::class, 'homepage'])->name('homepage');
    Route::get('/tracking', [FrontendController::class, 'track'])->name('tracking');

    // Profile
    Route::get('/profile', [FrontendController::class, 'profile'])->name('profile');
    Route::post('/profile/edit', [FrontendController::class, 'editProfile'])->name('edit.profile');

    // Order
    Route::get('/order', [FrontendController::class, 'order'])->name('order');
    Route::post('/order', [FrontendController::class, 'addItem'])->name('add.item');
    Route::post('/order/edit/{id}', [FrontendController::class, 'editItem'])->name('edit.item');
    Route::post('/order/done', [FrontendController::class, 'orderDone'])->name('order.done');
    Route::get('/order/items', [FrontendController::class, 'showOrderItems'])->name('show.order.items');
    Route::post('/order/delete/{id}', [FrontendController::class, 'deleteItem'])->name('delete.item');
    
    // Your Order
    Route::get('/your-order', [FrontendController::class, 'yourOrder'])->name('your.order');
    Route::get('/your-order/detail/{ordx_id}', [FrontendController::class, 'yourDetail'])->name('your.detail');
    Route::get('/your-order/feedback/{ordx_id}', [FrontendController::class, 'yourFeedback'])->name('your.feedback');
    
    // Complaint
    Route::get('/your-order/complaint/{ordx_id}', [FrontendController::class, 'yourComplaint'])->name('your.complaint');
    Route::post('/your-order/complaint/{ordx_id}', [FrontendController::class, 'submitComplaint'])->name('submit.complaint');

    // Finance
    Route::get('/finance', [FrontendController::class, 'finance'])->name('finance');
    Route::get('/finance/detail/{id}', [FrontendController::class, 'financeDetail'])->name('detail.finance');

    // Tracking
    Route::get('/tracking', [FrontendController::class, 'track'])->name('tracking');

});





// // Authentification
// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);
// Route::get('/homepage', [FrontendController::class, 'homepage'])->name('homepage');
