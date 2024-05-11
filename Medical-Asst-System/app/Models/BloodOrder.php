<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodOrder extends Model
{
    use HasFactory;
    protected $table="Blood_Orders";
    public $timestamps = false;
}

