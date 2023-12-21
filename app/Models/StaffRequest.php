<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffRequest extends Model
{
    use HasFactory;
    protected $table = 'staff_dbs_request';
    protected $fillable = [
        'staff_id',
        'request_amount',
        'deduction_amount',
        'date',
        'fixed'
    ];
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
