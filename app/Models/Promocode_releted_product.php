<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode_releted_product extends Model
{
    use HasFactory;
    protected $table = 'promocode_releted_products';
    protected $fillable = [ 
        'promocode_id',
        'product_id',
    ];

    // public function carts(){
    //     return $this->belongsTo(Cart::class, 'productid', 'product_id');    
    // }
}
