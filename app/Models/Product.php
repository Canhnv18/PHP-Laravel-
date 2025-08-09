<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // 
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image',
        'brand_id',
        'description',
        'status',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
