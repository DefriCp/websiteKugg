<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'description',   // penting untuk deskripsi full
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Opsional: helper URL gambar
    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : null;
    }
}
