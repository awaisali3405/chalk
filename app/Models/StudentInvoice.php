<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInvoice extends Model
{
    use HasFactory;
    protected $table = 'student_invoice';
    protected $fillable = [
        'student_id',
        'amount',
        'type',
        'is_paid',
        'from_date',
        'to_date'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function subject()
    {
        return $this->hasMany(InvoiceSubject::class, 'invoice_id');
    }
}
