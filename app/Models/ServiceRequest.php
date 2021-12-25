<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    function user(){
        return $this->belongsTo(User::class);
    }

    function service(){
        return $this->belongsTo(Service::class);
    }
}
