<?php

namespace App\Models;

use Carbon\Carbon;
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
        'dbs_deduct'
    ];
    public function request()
    {
        return $this->hasMany(StaffRequest::class, 'staff_id');
    }
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
    public function hours()
    {
        $hour = 0;
        $min = 0;
        foreach ($this->attendance as $key => $value) {
            $time = Carbon::parse($value->start_time)->diff($value->end_time);
            $hour += $time->h;
            $min += $time->i;
        }
        $hour += $min / 56;
        return number_format($hour, 2);
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
    public function invoice()
    {
        return $this->hasMany(SalaryInvoice::class, 'staff_id');
    }

    public function tax($from_date, $to_date)
    {
        return $this->receipt()->where('date', '>=', $from_date)->where('date', '<=', $to_date)->sum('tax');
    }
    public function empNI($from_date, $to_date)
    {
        return $this->receipt()->where('date', '>=', $from_date)->where('date', '<=', $to_date)->sum('ni');
    }
    public function empPension($from_date, $to_date)
    {
        return $this->receipt()->where('date', '>=', $from_date)->where('date', '<=', $to_date)->sum('pension');
    }
    public function salary($from_date, $to_date)
    {
        return $this->receipt()->where('date', '>=', $from_date)->where('date', '<=', $to_date)->sum('salary');
    }
    public function employerNI($from_date, $to_date)
    {
        return $this->receipt()->where('date', '>=', $from_date)->where('date', '<=', $to_date)->sum('employer_ni');
    }
    public function employerPension($from_date, $to_date)
    {
        return $this->receipt()->where('date', '>=', $from_date)->where('date', '<=', $to_date)->sum('employer_pension');
    }
    public function studentLoan($from_date, $to_date)
    {
        return $this->receipt()->where('date', '>=', $from_date)->where('date', '<=', $to_date)->sum('student_loan');
    }
    public function hmrc($from_date, $to_date)
    {
        return +$this->salary($from_date, $to_date) - ($this->empNI($from_date, $to_date) + $this->empPension($from_date, $to_date) + $this->tax($from_date, $to_date)  + $this->studentLoan($from_date, $to_date));
    }
}
