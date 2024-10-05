<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/profile', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('admin-dashboard');
});

Route::get('/user', function () {
    return view('admin-user');
});