<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $table = 'taxes';
    protected $fillable = [
        'tax_name',
        'tax_percentage',
    ];

    public function products(){
        return $this->belongsTo(Product::class, 'tax_id', 'id');
    }
}
