<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";
    protected $fillable = [
        'name'
    ];
    public function staff()
    {
        return $this->hasMany(Staff::class, 'department_id');
    }
    public function enquiry()
    {
        return $this->hasMany(TeacherEnquiry::class, 'department_id');
    }
}
