<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments_records extends Model
{
    use HasFactory;
    protected $table = "payments";
    public $incrementing = false;
    public $primaryKey = "payment_id";
}
