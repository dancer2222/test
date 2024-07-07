<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ='products';
    protected $fillable = ['title', 'expire_date', 'price', 'cover_img'];

    protected $casts = [
        'expire_date' => 'date',
    ];
}
