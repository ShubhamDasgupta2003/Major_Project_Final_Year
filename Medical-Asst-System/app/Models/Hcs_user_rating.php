<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcs_user_rating extends Model
{
    use HasFactory;
    protected $table = "hcs_user_ratings";
    protected $primaryKey = "rating_id";
}
