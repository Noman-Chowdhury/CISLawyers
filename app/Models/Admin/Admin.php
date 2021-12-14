<?php

namespace App\Models\Admin;

use App\Models\AdminPaymentAccount;
use App\Notifications\Admin\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable, HasRoles;

    protected $fillable = ['name', 'email', 'image','dob','phone_number', 'password',];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = ['email_verified_at' => 'datetime',];

    /**
     * Custom password reset notification.
     */
    public function sendPasswordResetNotification($token)
    {
//        $delay = now()->addSeconds(5);
//        $this->notify((new ResetPasswordNotification($token))->delay($delay));
        $this->notify(new ResetPasswordNotification($token));
    }
}