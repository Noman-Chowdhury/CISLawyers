<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/abouts', [\App\Http\Controllers\Frontend\HomeController::class, 'abouts'])->name('abouts');
Route::get('/contact', [\App\Http\Controllers\Frontend\HomeController::class, 'contact'])->name('contact');
Route::get('/lawyers', [\App\Http\Controllers\Frontend\HomeController::class, 'lawyersList'])->name('lawyers-list');
Route::get('/consultants', [\App\Http\Controllers\Frontend\HomeController::class, 'consultantsList'])->name('consultant-list');
Route::get('/financial-associates', [\App\Http\Controllers\Frontend\HomeController::class, 'financialAssociatesList'])->name('financialAssociate-list');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/service-request', [\App\Http\Controllers\Frontend\HomeController::class, 'serviceRequest'])->name('service-request');
    Route::post('/service-request', [\App\Http\Controllers\Frontend\HomeController::class, 'storeServiceRequest'])->name('store.service-request');
});


