<?php

use Illuminate\Support\Facades\Route;

<<<<<<< Updated upstream
Route::get('/', function () {
    return view('homepage');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/profile', function () {
    return view('login');
});
=======
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

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

    Route::get('/homepage', [FrontendController::class, 'homepage'])->name('homepage');
    Route::get('/complaint', [FrontendController::class, 'complaint'])->name('complaint');
    Route::get('/notification', [FrontendController::class, 'notification'])->name('notification');
    Route::get('/tracking', [FrontendController::class, 'track'])->name('tracking');

    // finance


});

Route::get('/finance', [FrontendController::class, 'finance'])->middleware(StudentMiddleware::class)->name('finance');
Route::get('/finance/detail/{id}', [FrontendController::class, 'financeDetail'])->middleware(StudentMiddleware::class)->name('detail.finance');


// --- POST ---
Route::post('/complaint', [FrontendController::class, 'createComplaint'])->middleware(StudentMiddleware::class)->name('complaint.create');
>>>>>>> Stashed changes

Route::get('/order', function () {
    return view('order');
});

<<<<<<< Updated upstream
Route::get('/profile', function () {
    return view('profile');
});
=======


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

>>>>>>> Stashed changes
