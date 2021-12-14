<?php

namespace App\Providers;

use App\Models\Admin\AdminSetting;
use App\Models\Admin\Category;
use App\Models\Admin\Organizations;
use App\Models\Seller\Product;
use App\Models\Seller\Service;
use App\Models\User;
use App\Observers\Admin\CategoryObserver;
use App\Observers\Admin\OrganizationsObserver;
use App\Observers\Seller\ProductObserver;
use App\Observers\Seller\ServiceObserver;
use App\Observers\UserObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
    }
}