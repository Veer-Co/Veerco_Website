<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'userid',
        'fname',
        'lname',
        'email',
        'mobile',
        'locationName',
        'townName',
        'city',
        'state',
        'country',
        'pincode',
        'address_status',
    ];
}
