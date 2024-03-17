<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amb_info extends Model
{
    use HasFactory;
    protected $table = "amb_info";
    public $incrementing = false;
    protected $primaryKey = "amb_no";
}
