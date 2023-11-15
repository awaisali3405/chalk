<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = "staff";
    protected $fillable = [
        'name',
        'designation',
        'contact_us',
        'branch_id',
        'department_id',
        'salary',
        'salary_type',
        'date_of_join',
        'teacher_enquiry_id',
        'email',
        'password',
    ];
    public function teacherEnquiry()
    {
        return $this->belongsTo(TeacherEnquiry::class, 'teacher_enquiry_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function attendance()
    {
        return $this->hasMany(StaffAttendance::class, 'staff_id');
    }
    public function pay()
    {
        if ($this->salary_type == "Hourly") {
            $attendance = $this->attendance;
            $total = 0;
            foreach ($attendance as $key => $value) {
                $total += $value->amount();
            }
            return $total;
        } else {
            return $this->salary;
        }
    }
    public function receipt()
    {
        return $this->hasMany(StaffReceipt::class, 'staff_id');
    }
    public function loan()
    {
        return $this->hasMany(StaffLoan::class, 'staff_id')->where('is_paid', false);
    }
}