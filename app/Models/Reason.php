<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $fillable = [
        'type',
        'title',
        'description',
        'image',
        'sort_order',
    ];
}
