<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital_info extends Model
{
    use HasFactory;
    protected $table = "hospital_info";
    public $incrementing = false;
    protected $primaryKey = "hos_id";
}
