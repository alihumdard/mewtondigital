<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\WebController;


Route::get('/', [WebController::class, 'contact_us'])->name('page.contact-us');
Route::post('/inquiries-store', [InquiryController::class, 'store'])->name('inquiries.store');


include __DIR__ . '/admin.php';