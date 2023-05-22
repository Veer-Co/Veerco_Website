<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Related_product extends Model
{
    use HasFactory;

    protected $table = 'related_products';

    protected $fillable = [
        'pro_id',
        'product_related',
    ];

    public function products(){
        return $this->belongsTo(Product::class, 'product_related', 'product_id');
    }
}
