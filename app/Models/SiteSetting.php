<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'logo',               // <--- tambahkan
        'hero_title',
        'hero_subtitle',
        'hero_button_text',
        'hero_background',
        'tagline',
    ];
}
