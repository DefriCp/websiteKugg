<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'key',
        'title',
        'description',
        'image',
        'sort_order',
    ];
}
