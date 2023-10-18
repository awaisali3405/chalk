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
        'invoice_id'
    ];
    public function invoice()
    {
        return $this->belongsTo(StudentInvoice::class, 'invoice_id');
    }
}
