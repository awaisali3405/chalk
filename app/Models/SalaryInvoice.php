<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryInvoice extends Model
{
    use HasFactory;
    protected $table = 'salary_invoice';
    protected $fillable = [
        'from_date',
        'to_date',
        'amount',
        'staff_id',
        'is_paid',
    ];
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
    public function period()
    {
        return $this->from_date . ' - ' . $this->to_date;
    }
}
