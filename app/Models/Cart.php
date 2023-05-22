<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = [
        'userid',
        'session_id',
        'productid',
        'quantity'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'productid', 'product_id');
    }

    // public function promocode_releted_products(){
    //     return $this->hasMany(Promocode_releted_product::class, 'product_id', 'productid');    
    // }
}
