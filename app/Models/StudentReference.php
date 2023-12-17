<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReference extends Model
{
    use HasFactory;
    protected $table = 'student_reference';
    protected $fillable = [

        'referred_student',
        'reference_student',
        'academic_year_id'
    ];
    public function referred()
    {
        return $this->belongsTo(Student::class, 'referred_student');
    }
    public function reference()
    {
        return $this->belongsTo(Student::class, 'reference_student');
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
}
