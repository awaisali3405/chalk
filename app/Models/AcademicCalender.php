<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicCalender extends Model
{
    use HasFactory;
    protected $table = "academic_calender";

    protected $fillable = [
        'start_date',
        'end_date',
        'active'
    ];
    public function period()
    {
        return $this->start_date . ' - ' . $this->end_date;
    }
}
