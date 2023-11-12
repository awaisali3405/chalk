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
        'rate'
    ];
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
