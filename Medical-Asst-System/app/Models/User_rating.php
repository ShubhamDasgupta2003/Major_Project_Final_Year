<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_rating extends Model
{
    use HasFactory;
    protected $table = "user_ratings";
    protected $primaryKey = "rating_id";

}
