<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_review extends Model
{
    use HasFactory;

    protected $table = 'product_reviews';
    protected $fillable = [
        'productid',
        'name',
        'email',
        'rating',
        'message',
        'review_image',
    ];
}
