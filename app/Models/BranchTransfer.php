<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchTransfer extends Model
{
    use HasFactory;
    protected $table = 'branch_transfer';
    protected $fillable = [
        'student_id',
        'last_roll_no',
        'last_branch_id',
        'branch_id',
        'active',
        'academic_year_id',
        'year_id',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function lastBranch()
    {
        return $this->belongsTo(Branch::class, 'last_branch_id');
    }
    public function newBranch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
    public function status()
    {
        return $this->active ? 'Active Branch' : 'Transferred Branch';
    }
}
