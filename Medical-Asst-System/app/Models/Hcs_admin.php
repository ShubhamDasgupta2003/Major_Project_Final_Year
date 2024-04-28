<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcs_admin extends Model
{
    use HasFactory;
    protected $table= "hcs_admins";
    protected $primaryKey="admin_id";
}
