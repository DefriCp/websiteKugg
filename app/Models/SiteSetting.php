<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'hero_title',
        'hero_subtitle',
        'hero_button_text',
        'hero_background',
        'hero_background_2',
        'hero_background_3',
        'tagline',
        'logo',           // kalau ada

        // KONTAK
        'address',
        'phone',
        'whatsapp',
        'email',

        // SOSMED
        'instagram_url',
        'facebook_url',
    ];
}
