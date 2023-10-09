<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceSubject extends Model
{
    use HasFactory;
    protected $table = 'student_invoice_subject';
    protected $fillable = [
        'invoice_id',
        'subject_name',
        'subject_rate'
    ];
    public function invoice()
    {
        return $this->belongsTo(StudentInvoice::class, 'invoice_id');
    }
}
