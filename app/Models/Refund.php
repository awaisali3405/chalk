<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Override;

class Refund extends Model
{
    use HasFactory;
    protected $table = "refund";
    protected $fillable = [
        'invoice_id',
        'paid_by_cash',
        'paid_by_bank',
        'academic_year_id',
        'branch_id',
        'amount',
        'lock'
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function invoice()
    {
        return $this->belongsTo(StudentInvoice::class, 'invoice_id');
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
    public function mode()
    {
        return $this->paid_by_cash ? 'Cash' : ($this->paid_by_bank ? 'Bank' : '');
    }
    public function refunded()
    {
        return $this->hasMany(InvoiceRefunded::class, 'refund_id');
    }
    public function refundedAmount()
    {
        if ($this->refunded) {
            return $this->refunded->sum('amount');
        } else {
            return 0;
        }
    }
    public function remainingDeposit()
    {
        return $this->amount - $this->refundedAmount();
    }
}
