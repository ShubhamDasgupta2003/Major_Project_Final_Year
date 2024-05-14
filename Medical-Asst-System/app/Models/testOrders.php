<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testOrders extends Model
{
    use HasFactory;
    protected $table="test_Orders";
    public $timestamps = false;
}
