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
        'to_date',
        'tax',
        'branch_id',
        'year_id',
        'academic_year_id',
        'code',
        'date',
        'discount',
        'description'
    ];
    public function debitBroughtForward()
    {
        $total = 0;
        $otherInvoice = $this->student->invoice->where('id', '<', $this->id);
        foreach ($otherInvoice as  $value) {
            $total += $value->remainingAmount();
        }
        return $total;
    }
    public function period()
    {
        return auth()->user()->ukFormat($this->from_date) . ' - ' . auth()->user()->ukFormat($this->to_date);
    }
    public function refund()
    {
        return $this->hasOne(Refund::class, 'invoice_id');
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
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
    public function InvoiceSubject()
    {
        return $this->belongsToMany(EnquirySubject::class, 'invoice_enquiry_subject', 'invoice_id', 'enquiry_subject_id');
    }
    public function resourceInvoiceSubject()
    {
        return $this->hasMany(EnquirySubject::class, 'resource_invoice_id');
    }
    public function hasOneOnOne()
    {
        return $this->InvoiceSubject->where("lesson_type_id ", 2)->count() > 0 ? true : false;
    }
    public function oneOnOneSubject()
    {

        return $this->InvoiceSubject()->where('lesson_type_id', 2)->get();
    }
    public function normalSubject()
    {
        return $this->InvoiceSubject()->where('lesson_type_id', 1)->get();
    }
    public function book()
    {
        return $this->hasMany(StudentBook::class, 'invoice_id');
    }
    public function subject()
    {
        return $this->hasMany(InvoiceSubject::class, 'invoice_id');
    }
    public function lastReceipt()
    {
        return $this->hasMany(StudentInvoiceReceipt::class, 'invoice_id')->where('academic_year_id', '<', auth()->user()->session()->id);
    }
    public function receipt()
    {
        return $this->hasMany(StudentInvoiceReceipt::class, 'invoice_id');
    }
    public function sale()
    {
        return $this->hasOne(Sale::class, 'invoice_id')->where('academic_year_id', auth()->user()->session()->id);
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
        return $this->amount - (($this->receipt->sum('discount') + $this->receipt->sum('credit_discount')) - $this->receipt->sum('late_fee')) - $this->receipt->sum('amount');
    }
    public function totalAmount()
    {
        if ($this->student->branch->tax_type == 'flat') {
            return ($this->amount - ($this->receipt->sum('discount') + $this->receipt->sum('credit_discount'))) + $this->receipt->sum('late_fee');
        } else {

            return ($this->amount - ($this->receipt->sum('discount') + $this->receipt->sum('credit_discount')));
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
    public function status()
    {
        return $this->is_paid ? ($this->refunded() ? 'Refunded' : 'Paid') : 'Un Paid';
    }
    public function refunded()
    {
        if ($this->refund) {

            return $this->refund->where('paid_by_bank', true)->orWhere('paid_by_cash', true)->count();
        } else {
            return 0;
        }
    }
    public function paidRefund()
    {
        return $this->hasOne(Refund::class, 'invoice_id')->where('paid_by_bank', true)->orWhere('paid_by_cash', true);
    }
}
