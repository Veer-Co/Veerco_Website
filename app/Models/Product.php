<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'product_id',
        'product_name',
        'product_slug',
        'category_id',
        'mrp',
        'price',
        'sku',
        'model_number',
        'hsn',
        'is_top_product',
        'todays_deal',
        'is_featured',
        'short_description',
        'description',
        'overview',
        'subcategory_id',
        'brand_id',
        'weight',
        'length',
        'wide',
        'height',
        'stock_status',
        'store_house',
        'quantity',
        'isCheckout',
        'est_shipping_days',
        'tax_id',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'seo_schema',
        'thumbnail',
    ];
    // public $timestamps = false;
    protected static function boot()
    {
        parent::boot();
        static::created(function ($productpost) {
            $productpost->product_slug = $productpost->generateSlug($productpost->product_name);
            $productpost->save();
        });
    }
    private function generateSlug($name)
    {
        if (static::whereProduct_slug($slug = Str::slug($name))->exists()) {
            $max = static::whereProduct_name($name)->latest('id')->skip(1)->value('product_slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}";
        }
        return $slug;
    }

    public function product_images(){
        return $this->hasMany(Product_image::class, 'product_img_id', 'product_id');
    }
    public function categories(){
        return $this->hasMany(Category::class, 'category_slug', 'category_id');
    }
    public function related_products(){
        return $this->hasMany(Related_product::class, 'product_id', 'product_related');
    }
    public function taxes(){
        return $this->hasOne(Tax::class, 'id', 'tax_id');
    }
    public function bought_together_products(){
        return $this->hasMany(BoughtTogetherProduct::class, 'product_id', 'bought_selling');
    }
    // public function orderItem(){
    //     return $this->hasMany(Product_image::class, 'product_img_id', 'product_id');
    // }
}
