<?php

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\VerificationController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function () {
    //admin authentication system
    Route::get('slogon', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('slogon', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
        Route::post('add-member', [AdminHomeController::class, 'add_partner'])->name('admin.partner.add');
        Route::get('member-list', [AdminHomeController::class, 'partner_list'])->name('admin.member.list');

        Route::get('frontend/home',[\App\Http\Controllers\FrontendController::class, 'getHomeSetting'])->name('home.setting');
        Route::post('frontend/home/carousel',[\App\Http\Controllers\FrontendController::class, 'storeCarousel'])->name('store.carousel');
        Route::get('frontend/home/carousel/{id}',[\App\Http\Controllers\FrontendController::class, 'sliderImageDelete'])->name('slider.image.delete');
        Route::put('frontend/home/carousel-text', [\App\Http\Controllers\FrontendController::class, 'storeSliderText'])->name('store.slider.text');
        Route::put('frontend/home/feature', [\App\Http\Controllers\FrontendController::class, 'storeFeature'])->name('store.feature');
        Route::put('frontend/home/law', [\App\Http\Controllers\FrontendController::class, 'storeLaw'])->name('store.law');
        Route::put('frontend/home/lawHeader', [\App\Http\Controllers\FrontendController::class, 'lawHeader'])->name('store.law.header');
        Route::get('frontend/home/laws', [\App\Http\Controllers\FrontendController::class, 'laws'])->name('law.list');
        Route::get('frontend/basic', [\App\Http\Controllers\FrontendController::class, 'basic'])->name('basic');
        Route::put('frontend/basic', [\App\Http\Controllers\FrontendController::class, 'storeBasic'])->name('basic.store');
        Route::put('frontend/home/client', [\App\Http\Controllers\FrontendController::class, 'storeClientContent'])->name('store.client.content');

        Route::resource('case', \App\Http\Controllers\Admin\CaseController::class);
        Route::resource('service', \App\Http\Controllers\Admin\ServiceController::class);
        Route::resource('client', \App\Http\Controllers\Admin\ClientController::class);
    });
});
