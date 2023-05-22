<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cross_selling_product extends Model
{
    use HasFactory;
    protected $table = 'cross_selling_products';

    protected $fillable = [
        'pro_id',
        'product_cross_selling',
    ];
}
