<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance_Admin extends Model
{
    use HasFactory;
    protected $table = "ambulance_admin";
    protected $primaryKey = "user_no";
}
