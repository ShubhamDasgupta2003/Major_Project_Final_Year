<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blood_group extends Model
{
    protected $table="blood_group";
    protected $primaryKey = "blood_group_id";
    use HasFactory;
}
