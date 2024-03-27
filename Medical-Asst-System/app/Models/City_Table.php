<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City_Table extends Model
{
    use HasFactory;
    protected $table = "city";
    protected $primaryKey = "city_id";
}
