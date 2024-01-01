<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInvoiceRefund extends Model
{
    use HasFactory;
    protected $table = 'student_invoice_refund';
    protected $fillable = [
        'invoice_id',
        'amount',
        'discount',
        'date',
        'description',
        'academic_year_id',
        'branch_id',
        'mode'
    ];
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function invoice()
    {
        return $this->belongsTo(StudentInvoice::class, 'invoice_id');
    }
}
