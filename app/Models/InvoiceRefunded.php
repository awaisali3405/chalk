<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceRefunded extends Model
{
    use HasFactory;
    protected $table = 'invoice_refunded';
    protected $fillable = [
        'refund_id',
        'description',
        'amount',
        'date',
        'transfer_invoice_id',
        'academic_year_id',
        'branch_id',
        'mode'
    ];
    public function refund()
    {
        return $this->belongsTo(Refund::class, 'refund_id');
    }
    public function invoice()
    {
        return $this->belongsTo(StudentInvoice::class, 'transfer_invoice_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
}
