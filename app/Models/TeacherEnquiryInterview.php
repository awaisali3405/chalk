<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherEnquiryInterview extends Model
{
    use HasFactory;
    protected $table = 'teacher_enquiry_interview';
    protected $fillable = [
        'teacher_enquiry_id',
        'date',
        'time'
    ];
    public function teacherEnquiry()
    {
        return $this->belongsTo(TeacherEnquiry::class, 'teacher_enquiry_id');
    }
}
