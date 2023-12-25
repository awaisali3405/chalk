<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInvoiceReceipt extends Model
{
    use HasFactory;
    protected $table = "student_invoice_receipt";
    protected $fillable = [
        'amount',
        'discount',
        'late_fee',
        'date',
        'description',
        'mode',
        'invoice_id', 'academic_year_id', 'credit_discount',
        'wallet_amount'
    ];
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
    public function invoice()
    {
        return $this->belongsTo(StudentInvoice::class, 'invoice_id');
    }
}
