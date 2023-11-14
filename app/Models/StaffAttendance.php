<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffAttendance extends Model
{
    use HasFactory;
    protected $table = "staff_attendance";
    protected $fillable = [
        "date",
        'start_time',
        'end_time',
        'staff_id',
        'paid_hour',
        'rate',
        'is_paid'
    ];
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
    public function amount()
    {
        return $this->paid_hour * $this->rate;
    }
    public function period()
    {
        return  auth()->user()->timeFormat($this->start_time) . ' ' . auth()->user()->timeFormat($this->end_time);
    }
}
