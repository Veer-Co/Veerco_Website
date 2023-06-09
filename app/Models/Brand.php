<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    protected $table = 'brands';
    use HasFactory;

    protected $fillable = [
        'brand_slug',
        'brand',
        'brand_image',
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($brand) {
            $brand->brand_slug = $brand->generateBrandSlug($brand->brand);
            $brand->save();
        });
    }

    private function generateBrandSlug($bname)
    {
        if (static::whereBrand_slug($slug = Str::slug($bname))->exists()) {
            $max = static::whereBrand($bname)->latest('id')->skip(1)->value('brand_slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}";
        }
        return $slug;
    } 
}
