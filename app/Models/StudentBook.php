<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBook extends Model
{
    use HasFactory;
    protected $table = 'student_addition_book';
    protected $fillable = [
        'invoice_id',
        'subject_id',
        'subject_name',
        'book_name',
        'quantity',
        'rate',
        'academic_year_id',
        'branch_id',
        'amount'
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function invoice()
    {
        return $this->belongsTo(StudentInvoice::class, 'invoice_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
    public function student()
    {
        return $this->invoice->student;
    }
}
