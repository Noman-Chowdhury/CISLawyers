<?php

namespace App\Providers;

use App\Models\Admin\AdminSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        View::composer('*', function ($view) {
//            $adminWebSetting = AdminSetting::first();
//            $view->with(['adminWebSetting' => $adminWebSetting]);
//        });
    }
}