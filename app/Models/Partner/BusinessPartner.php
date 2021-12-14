<?php

namespace App\Models\Partner;

use App\Notifications\Seller\ResetPasswordNotification;
use App\Notifications\Seller\SellerEmailVerifyNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class BusinessPartner extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $fillable = ['name', 'image','email', 'phone_number', 'password', 'email_verified_at', 'last_seen_at'];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = ['email_verified_at' => 'datetime', 'last_seen_at'=>'datetime'];


    /**
     * Custom password reset notification.
     */
    public function sendPasswordResetNotification($token)
    {
//        $delay = now()->addSeconds(5);
//        $this->notify((new ResetPasswordNotification($token))->delay($delay));
        $this->notify(new ResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new SellerEmailVerifyNotification());
    }
}