<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffLoan extends Model
{
    use HasFactory;
    protected $table = 'staff_loan';
    protected $fillable = [
        'branch_id',
        'staff_id',
        'amount',
        'partition',
        'mode',
        'is_paid'
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
    public function installment()
    {
        return number_format($this->amount / $this->partition);
    }
    public function remaining()
    {
        return $this->amount - $this->staff->receipt->sum('loan');
    }
    public function paid()
    {
        return  $this->staff->receipt->sum('loan');
    }
}
