<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product_image extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    protected $fillable = [ 
        'product_img_id',
        'product_image'
    ];
        

    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'product_img_id');
    }
}
