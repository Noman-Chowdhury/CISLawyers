<?php

namespace App\Listeners;

use App\Models\Admin\Admin;
use App\Models\Partner\BusinessPartner;
use App\Models\Seller\Seller;
use App\Models\User;
use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogFailedLogin
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
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        if ($event->guard == 'admin'){
            $model = new Admin();
        }elseif ($event->guard == 'partner'){
            $model = new BusinessPartner();
        }else{
            $model = new User();
        }
        activity($event->guard.'_login')
            ->causedBy($model)
            ->performedOn($model)
            ->withProperties([
                'login_ip' => \request()->ip(),
                'user_agent' => \request()->userAgent(),
            ])
            ->log('Failed');
    }
}
