<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_booking_info extends Model
{
    use HasFactory;
    protected $table = "patient_booking_info";
    public $incrementing = false;
    protected $primaryKey = "pnt_id";
}
