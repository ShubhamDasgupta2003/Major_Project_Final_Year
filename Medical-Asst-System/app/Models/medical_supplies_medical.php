<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medical_supplies_medical extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'product_id',
        'product_name',
        'category',
        'quantity',
        'product_keywords',
        'product_rate',
        'product_image',
        'product_para',
        'product_desc',
        'product_makers'
    ];
}
