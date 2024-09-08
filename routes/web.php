<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';



// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

// Route::view('/admin', 'admin.dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');