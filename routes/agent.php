<?php

use App\Http\Controllers\Agent\Auth\ForgotPasswordController;
use App\Http\Controllers\Agent\Auth\LoginController as AgentLoginController;
use App\Http\Controllers\Agent\Auth\ResetPasswordController;
use App\Http\Controllers\Agent\HomeController as AgentHomeController;
use App\Http\Controllers\Agent\NotificationController;

Route::group(['prefix' => 'agent', 'as' => 'agent.'], function () {
    //agent authentication system
    Route::get('login', [AgentLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AgentLoginController::class, 'login']);
    Route::post('logout', [AgentLoginController::class, 'logout'])->name('logout');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::group(['middleware' => 'auth:agent'], function () {
        Route::get('/home', [AgentHomeController::class, 'index'])->name('home');
        //Agent profile manage routes
        Route::get('/profile', [AgentHomeController::class, 'view_profile'])->name('view.profile');
        Route::post('/profile/{id}', [AgentHomeController::class, 'update_general'])->name('update_general');
        Route::post('/profile/password/{id}', [AgentHomeController::class, 'update_password'])->name('update.password');
        //Agent Notification
        Route::get('/notification', [NotificationController::class, 'index'])->name('notification.index');
        Route::get('/mark-as-read/[{id},{r_name},{product_id}]', [NotificationController::class, 'mark_as_read'])->name('mark-as-read');
        Route::post('/delete-notification', [NotificationController::class, 'deleteNotification'])->name('delete.notification');
    });
});
