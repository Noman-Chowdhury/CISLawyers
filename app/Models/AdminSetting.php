<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo', 'slogan', 'email', 'phone_number', 'about_us', 'website_url',
        'facebook_url', 'twitter_url', 'google_plus_url', 'linkedin_url',
        'youtube_url', 'instagram_url', 'address', 'upazila', 'district',
        'division','term_condition','faqs','responsibilities','location', 'rules'
    ];
}
