<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HMRC extends Model
{
    use HasFactory;
    protected $table = 'hmrc';
    protected $fillable = [
        'payment_type',
        'amount',
        'discount',
        'from_date',
        'to_date',
        'date',
        'branch_id',
        'academic_year_id',
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
    public function period()
    {
        return auth()->user()->ukFormat($this->from_date) . ' - ' . auth()->user()->ukFormat($this->to_date);
    }
}
