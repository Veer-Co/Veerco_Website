<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'userid',
        'fname',
        'lname',
        'email',
        'mobile',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'total_amount',
        'status',
        'payment_mode',
        'message',
        'tracking_no',
        'shipping_date',
        'delivered_date',
    ];
    protected $casts = [
        'shipping_date' => 'datetime',
        'delivered_date' => 'datetime',
     ];
    public function order_items(){
        return $this->hasMany(OrderItem::class, 'order_id', 'id');    
    }
}
