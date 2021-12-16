<?php

use App\Http\Controllers\Partner\Auth\ForgotPasswordController;
use App\Http\Controllers\Partner\Auth\LoginController as PartnerLoginController;
use App\Http\Controllers\Partner\Auth\RegisterController as PartnerRegisterController;
use App\Http\Controllers\Partner\Auth\ResetPasswordController;
use App\Http\Controllers\Partner\Auth\VerificationController;
use App\Http\Controllers\Partner\HomeController as PartnerHomeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'partner', 'as' => 'partner.'], function () {
    //seller authentication system
    Route::get('register', [PartnerRegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [PartnerRegisterController::class, 'register']);
    Route::get('login', [PartnerLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [PartnerLoginController::class, 'login']);
    Route::post('logout', [PartnerLoginController::class, 'logout'])->name('logout');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    //email verification
    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
//    Route::post('/image-upload',[ImageUploadController::class,'uploadImage'])->name('uploadImage');

//    Route::group(['middleware' => ['auth:seller', ]], function () {

        Route::get('/home', [PartnerHomeController::class, 'index'])->name('home');

//    });
});
