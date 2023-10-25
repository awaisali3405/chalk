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
    public function receipt()
    {
        return $this->hasMany(StudentInvoiceReceipt::class, 'invoice_id');
    }
    public function sale()
    {
        return $this->hasOne(Sale::class, 'invoice_id');
    }
    public function saleProduct()
    {
        return $this->hasManyThrough(
            SaleProduct::class,
            Sale::class,
            'invoice_id', // Foreign key on the environments table...
            'sale_id', // Foreign key on the deployments table...
            'id',
            'id'
        );
    }
}
