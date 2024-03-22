<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_ambulance extends Model
{
    use HasFactory;
    protected $table = "patient_ambulance";
    protected $incrementing = false;
    protected $primaryKey = "invoice_no";
}
