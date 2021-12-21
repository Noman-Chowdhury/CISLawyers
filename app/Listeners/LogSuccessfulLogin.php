<?php

namespace App\Listeners;

use App\Models\Admin\Admin;
use App\Models\Partner\BusinessPartner;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class LogSuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        if ($event->guard == 'admin'){
//            $id=$event->user->id;
            $model = new Admin();
        }elseif ($event->guard == 'partner'){
//            $id=$event->user->id;
            $model = new BusinessPartner();
        }else{
//            $id=$event->user->id;
            $model = new User();
        }
//        $model = new User();
        activity($event->guard.'_login')
            ->causedBy($model)
            ->performedOn($model)
            ->withProperties([
//                'event' => $event,
                'login_ip' => \request()->ip(),
                'user_agent' => \request()->userAgent(),
            ])
            ->log('Success');
    }
}
