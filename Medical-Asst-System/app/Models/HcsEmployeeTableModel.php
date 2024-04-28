<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HcsEmployeeTableModel extends Model
{
    use HasFactory;
    protected $table= "hcs_employee";
    protected $primaryKey="emp_id";
}
