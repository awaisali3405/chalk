<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPayroll extends Model
{
    use HasFactory;
    protected $table = 'teacher_payroll';
    protected $fillable = [
        'name',
        'date',
        'file',
        'teacher_enquiry_id'
    ];
    public function enquiry()
    {
        return $this->belongsTo(TeacherEnquiry::class, 'teacher_enquiry_id');
    }
}
