<?php

namespace App\Listeners;

use App\Models\Admin\Admin;
use App\Models\Seller\Seller;
use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        if ($event->guard == 'admin'){
            $model = new Admin();
        }elseif ($event->guard == 'seller'){
            $model = new Seller();
        }else{
            $model = new User();
        }
        activity($event->guard.'_logout')
            ->causedBy($model)
            ->performedOn($model)
            ->withProperties([
                'login_ip' => \request()->ip(),
                'user_agent' => \request()->userAgent(),
            ])
            ->log('Success');
    }
}
