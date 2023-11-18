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
        'to_date', 'tax',
        'branch_id',
        'year_id'
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
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
    public function remainingAmount()
    {
        return $this->amount - ($this->receipt->sum('discount') - $this->receipt->sum('late_fee')) - $this->receipt->sum('amount');
    }
    public function totalAmount()
    {
        if ($this->student->branch->tax_type == 'flat') {
            return ($this->amount - ($this->receipt->sum('discount'))) + $this->receipt->sum('late_fee');
        } else {

            return ($this->amount - ($this->receipt->sum('discount')));
        }
    }
    public function taxAmount()
    {
        if ($this->type == "Refundable" || $this->type == "Resource Fee") {
            return 0;
        } else {

            return $this->totalAmount() - (($this->totalAmount() / (100 + $this->tax)) * 100);
        }
    }
    public function paidAmount()
    {
        return $this->receipt->sum('amount');
    }
}
