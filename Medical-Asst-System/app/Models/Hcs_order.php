<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcs_order extends Model
{
    use HasFactory;
    protected $table= "hcs_orders";
    protected $primaryKey="order_id";
    protected $fillable = [
        'order_status', // Add order_status here
        // Add other fields that can be mass assigned if needed
    ];
}
