<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

require('admin.php');
//require('agent.php');
require('partners.php');

//language change (localization)
Route::get('/lang/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return back();
})->name('set-locale');

//Route::view('/{any}', 'frontend')->where('any', '.*');
