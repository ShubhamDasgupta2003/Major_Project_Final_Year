<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medical_supplies_order extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'order_id',
        'user_id',
        'product_name',
        'product_rate',
        'product_quantity',
        'user_name',
        'user_email'
    ];
}
