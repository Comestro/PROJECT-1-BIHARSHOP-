<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';



Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/add-category', function () {
    return view('admin.insertCategory');
});

Route::get('/admin/manage-category', function () {
    return view('admin.manageCategory');
});

Route::get('/admin/add-product', function () {
    return view('admin.insertProduct');
});

Route::get('/admin/manage-product', function () {
    return view('admin.manageProduct');
});

// Route::view('/admin', 'admin.dashboard');