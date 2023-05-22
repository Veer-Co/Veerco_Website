<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Up_selling_product extends Model
{
    use HasFactory;
    protected $table = 'up_selling_products';

    protected $fillable = [
        'pro_id',
        'product_up_selling'
    ];
}
