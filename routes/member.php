<?php

use App\Http\Controllers\Partner\Auth\ForgotPasswordController;
use App\Http\Controllers\Partner\Auth\LoginController as MemberLoginController;
use App\Http\Controllers\Partner\Auth\RegisterController as MemberRegisterController;
use App\Http\Controllers\Partner\Auth\ResetPasswordController;
use App\Http\Controllers\Partner\Auth\VerificationController;
use App\Http\Controllers\Partner\HomeController as MemberHomeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'member', 'as' => 'member.'], function () {
    //seller authentication system
    Route::get('register', [MemberRegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [MemberRegisterController::class, 'register']);
    Route::get('login', [MemberLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [MemberLoginController::class, 'login']);
    Route::post('logout', [MemberLoginController::class, 'logout'])->name('logout');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    //email verification
    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
//    Route::post('/image-upload',[ImageUploadController::class,'uploadImage'])->name('uploadImage');

    Route::group(['middleware' => ['auth:member']], function () {
        Route::get('/home', [MemberHomeController::class, 'index'])->name('home');

//        profile view and edit
        Route::get('/my-profile', [MemberHomeController::class, 'showProfile'])->name('show.profile');
        Route::post('/profile/general', [MemberHomeController::class, 'update_general_info'])->name('update.general');
        Route::post('/profile/password', [MemberHomeController::class, 'update_password_info'])->name('update.password');
    });
});
