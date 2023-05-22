<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $table = 'categories';
    use HasFactory;
    protected $fillable = [
        'category_slug',
        'category',
        'category_image'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($category) {
            $category->category_slug = $category->generateCatSlug($category->category);
            $category->save();
        });
    }

    private function generateCatSlug($cname)
    {
        if (static::whereCategory_slug($slug = Str::slug($cname))->exists()) {
            $max = static::whereCategory($cname)->latest('id')->skip(1)->value('category_slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }   

    public function product(){
        return $this->belongsTo(Product::class, 'category_id', 'category_slug');
    }

}
