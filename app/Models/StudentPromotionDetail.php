<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPromotionDetail extends Model
{
    use HasFactory;
    protected $table = 'student_promotion_detail';
    protected $fillable = [

        'from_year_id',
        'to_year_id',
        'student_id',
        'academic_year_id',
        'roll_no'
    ];
    public function fromYear()
    {
        return $this->belongsTo(Year::class, 'from_year_id');
    }
    public function toYear()
    {
        return $this->belongsTo(Year::class, 'to_year_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
}
