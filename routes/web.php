<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Controllers\FrontendController;

<<<<<<< Updated upstream
// User
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/homepage', [FrontendController::class, 'homepage'])->name('homepage');


// --- GET ---
// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);
// Route::get('/homepage', [FrontendController::class, 'homepage'])->middleware(StudentMiddleware::class)->name('homepage');
// // Route::get('/order', [FrontendController::class, 'order'])->middleware(StudentMiddleware::class)->name('order');
// Route::get('/profile', [FrontendController::class, 'profile'])->middleware(StudentMiddleware::class)->name('profile');
// Route::get('/complaint', [FrontendController::class, 'complaint'])->middleware(StudentMiddleware::class)->name('complaint');
// Route::get('/notification', [FrontendController::class, 'notification'])->middleware(StudentMiddleware::class)->name('notification');
Route::get('/tracking', [FrontendController::class, 'track'])->middleware(StudentMiddleware::class)->name('tracking');
// Route::get('/finance', [FrontendController::class, 'finance'])->middleware(StudentMiddleware::class)->name('finance');
=======
// Authentification
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/homepage', [FrontendController::class, 'homepage'])->name('homepage');
>>>>>>> Stashed changes

// Guest
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

<<<<<<< Updated upstream
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => StudentMiddleware::class], function (){
    // Order
    Route::get('/order', [FrontendController::class, 'order'])->name('order');
    Route::post('/order', [FrontendController::class, 'addItem'])->name('add.item');
    Route::post('/order/edit/{id}', [FrontendController::class, 'editItem'])->name('edit.item');
    Route::post('/order/done', [FrontendController::class, 'orderDone'])->name('order.done');
    Route::get('/order/items', [FrontendController::class, 'showOrderItems'])->name('show.order.items');
    Route::post('/order/delete/{id}', [FrontendController::class, 'deleteItem'])->name('delete.item');
    
    // Your Order
    Route::get('/your-order', [FrontendController::class, 'yourOrder'])->name('your.order');
    Route::get('/your-order-detail/{ordx_id}', [FrontendController::class, 'yourDetail'])->name('your.detail');


    Route::get('/your-order-feedback/{order_id}', [FrontendController::class, 'yourFeedback'])->name('your.feedback');
    
    // Complaint
    Route::get('/your-order-complaint/{ordx_id}', [FrontendController::class, 'yourComplaint'])->name('your.complaint');
    Route::post('/your-order-complaint/{ordx_id}', [FrontendController::class, 'submitComplaint'])->name('submit.complaint');

=======
// Student Route
Route::group(['middleware' => StudentMiddleware::class], function (){
    // General
>>>>>>> Stashed changes
    Route::get('/homepage', [FrontendController::class, 'homepage'])->name('homepage');
    Route::get('/complaint', [FrontendController::class, 'complaint'])->name('complaint');
    Route::get('/notification', [FrontendController::class, 'notification'])->name('notification');
    Route::get('/tracking', [FrontendController::class, 'track'])->name('tracking');

<<<<<<< Updated upstream
    // finance


});

Route::get('/finance', [FrontendController::class, 'finance'])->middleware(StudentMiddleware::class)->name('finance');
Route::get('/finance/detail/{id}', [FrontendController::class, 'financeDetail'])->middleware(StudentMiddleware::class)->name('detail.finance');


// --- POST ---
Route::post('/complaint', [FrontendController::class, 'createComplaint'])->middleware(StudentMiddleware::class)->name('complaint.create');




// profile
Route::get('/profile', [FrontendController::class, 'profile'])->middleware(StudentMiddleware::class)->name('profile');
Route::post('/profile/edit', [FrontendController::class, 'editProfile'])->middleware(StudentMiddleware::class)->name('edit.profile');


// Admin Route

Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->middleware(AdminMiddleware::class)->name('admin_dashboard')->controllerMiddleware('admin');
Route::get('/admin-user', [AdminController::class, 'admin_user'])->middleware(AdminMiddleware::class)->name('admin_user')->controllerMiddleware('admin');

// Admin Order
Route::get('/admin-order', [AdminController::class, 'admin_order'])->middleware(AdminMiddleware::class)->name('admin_order')->controllerMiddleware('admin');
Route::get('/order/detail/{order_id}', [AdminController::class, 'showDetail'])->name('admin_order_detail')->controllerMiddleware('admin');
Route::post('/admin-order/update/{orderId}', [AdminController::class, 'admin_order_update'])->middleware(AdminMiddleware::class)->name('admin_order_update')->controllerMiddleware('admin');


Route::get('/admin-complaint', [AdminController::class, 'admin_complaint'])->middleware(AdminMiddleware::class)->name('admin_complaint')->controllerMiddleware('admin');

=======
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


// Admin Route
Route::group(['middleware' => AdminMiddleware::class], function () {
    // Admin Route
    Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard');
    Route::get('/admin-user', [AdminController::class, 'admin_user'])->name('admin_user');

    // Admin Order
    Route::get('/admin-order', [AdminController::class, 'admin_order'])->name('admin_order');
    Route::get('/admin-order/detail/{ordx_id}', [AdminController::class, 'admin_order_detail'])->name('admin.order.detail');
    Route::get('/admin-order/edit/{ordx_id}', [AdminController::class, 'editOrder'])->name('admin_order_edit');
    Route::post('/admin-order/update/{ordx_id}', [AdminController::class, 'admin_order_update'])->name('admin_order_update');

    // Admin Profile
    Route::get('/admin-profile', [AdminController::class, 'admin_profile'])->name('admin_profile');
    Route::post('/admin-profile/edit', [AdminController::class, 'adminEditProfile'])->name('admin_editProfile');

    // Complaint
    Route::get('/admin-complaint', [AdminController::class, 'adminComplaint'])->name('admin_complaint');
    Route::get('/admin-complaint/feedback/{complaint_id}', [AdminController::class, 'showComplaint'])->name('show.complaint');
    Route::post('/admin-complaint/feedback/{complaint_id}', [AdminController::class, 'createFeedback'])->name('add.feedback');
});


>>>>>>> Stashed changes
