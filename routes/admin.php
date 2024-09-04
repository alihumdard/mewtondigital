<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\InquiryController;

// Routes for admin with authentication check
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::delete('/inquiries', [InquiryController::class, 'destroy'])->name('inquiries.destroy');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout'); 
});

// Routes for login
Route::get('/login', [AdminController::class, 'login'])->name('login'); 
Route::post('/login', [AdminController::class, 'login_check'])->name('login.check');

