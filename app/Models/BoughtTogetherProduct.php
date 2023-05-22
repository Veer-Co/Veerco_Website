<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoughtTogetherProduct extends Model
{
    use HasFactory;
    protected $table = 'bought_together_products';
    protected $fillable = [
        'pro_id',
        'bought_selling'
    ];

    public function products(){
        return $this->belongsTo(Product::class, 'bought_selling', 'product_id');
    }
}
