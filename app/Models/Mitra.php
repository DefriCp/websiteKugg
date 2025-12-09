<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $fillable = [
        'name',
        'type',
        'logo_path',
        'website',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
