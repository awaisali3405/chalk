<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance';
    protected $fillable = [
        'student_id',
        'subject_id',
        'status',
        'date',
        'note'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function enquirySubject()
    {
        return $this->belongsTo(EnquirySubject::class, 'subject_id');
    }
    /**
     * Summary of statusName
     * @return string
     */
    public function statusName(): string
    {
        if ($this->status == 1) {
            return "Present";
        } else if ($this->status == 2) {
            return "Absent";
        } else if ($this->status == 3) {
            return "Unautorized";
        } else if ($this->status == 4) {
            return "Additional Class";
        } else if ($this->status == 5) {
            return "Cover Up";
        }
    }
}
