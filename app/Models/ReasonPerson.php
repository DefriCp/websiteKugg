<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReasonPerson extends Model
{
    protected $fillable = [
        'group',
        'name',
        'position',
        'photo',
        'sort_order',
    ];
}
