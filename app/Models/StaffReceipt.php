<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffReceipt extends Model
{
    use HasFactory;
    protected $table = 'staff_receipt';

    protected $fillable = [
        'staff_id',
        'from_date',
        'to_date',
        'salary',
        'deduction',
        'tax',
        'ssp',
        'ni',
        'dbs',
        'pension',
        'loan',
        'total',
        'bonus',
        'date',
        'note',
        'mode',
        'academic_year_id',
        'branch_id',
        'student_loan',
        'employer_ni',
        'employer_pension',
    ];

    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
    public function total()
    {
        return ($this->salary + $this->ssp + $this->bonus) - ($this->tax + $this->pension + $this->dbs + $this->ni + $this->loan + $this->deduction + $this->bonus);
    }
}
