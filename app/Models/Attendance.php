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
            return "Authorised";
        } else if ($this->status == 3) {
            return "Unauthorised";
        } else if ($this->status == 4) {
            return "Additional Class";
        } else if ($this->status == 5) {
            return "Cover Up";
        }
    }
    public function getStatusColorAttribute()
    {
        if ($this->status == 1) {
            return "White !important";
        } else if ($this->status == 2) {
            return "lightpink !important";
        } else if ($this->status == 3) {
            return "lightcoral !important";
        } else if ($this->status == 4) {
            return "lightyellow !important";
        } else if ($this->status == 5) {
            return "lightgreen !important";
        }
        return 'test';
    }
}
