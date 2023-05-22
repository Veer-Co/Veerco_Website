<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;
    protected $table = 'promocodes';
    protected $fillable = [ 
        'promocode',
        'coupon_type',
        'discount',
        'apply_for',
        'order_amount',
    ];
}
