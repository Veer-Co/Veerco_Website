<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode_releted_customer extends Model
{
    use HasFactory;
    protected $table = 'promocode_releted_customers';
    protected $fillable = [ 
        'promocode_id',
        'customer_id',
    ];
}
