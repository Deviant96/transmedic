<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand', 'model', 'plate_number', 'price_per_day', 'available', 'image_url',
    ];

    public $timestamps = false;
}
