<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');





Route::get('/admin', function () {
    return view('admin.dashboard');
});
Route::get('/',[PublicController::class,"index"])->name("index");


// Route::view('/admin', 'admin.dashboard');
require __DIR__.'/auth.php';