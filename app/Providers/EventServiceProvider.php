<?php

namespace App\Providers;

use App\Events\BuyRequestEvent;
use App\Events\ItemCommentEvent;
use App\Events\OrderConfirmedEvent;
use App\Events\OrderPlacedEvent;
use App\Events\SellerItemStatusEvent;
use App\Events\SellerItemFeatureSponsorStatusEvent;
use App\Events\SellerOrganizationStatusEvent;
use App\Events\SourcePageEvent;
use App\Events\SellerItemInquiryEvent;
use App\Listeners\SendBuyRequestNotification;
use App\Listeners\SendItemCommentNotification;
use App\Listeners\SendOrderConfirmedNotification;
use App\Listeners\SendOrderPlacedNotification;
use App\Listeners\SendSellerItemInquiryNotification;
use App\Listeners\SendSellerItemStatusNotification;
use App\Listeners\SendSellerItemFeatureSponsorNotification;
use App\Listeners\SendSellerOrganizationStatusNotification;
use App\Listeners\SendSourcePageNotification;
use App\Notifications\User\OrderConfirmedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogSuccessfulLogin',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\LogSuccessfulLogout',
        ],
        'Illuminate\Auth\Events\Failed' => [
            'App\Listeners\LogFailedLogin',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}