<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function orders(){
        return $this->belongsTo(Order::class, 'id', 'order_id');
    }
    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
