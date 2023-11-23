<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicCalender extends Model
{
    use HasFactory;
    protected $table = "academic_calender";

    protected $fillable = [
        'start_date',
        'end_date',
        'active'
    ];
    public function period()
    {
        return $this->start_date . ' - ' . $this->end_date;
    }
    public function invoice()
    {
        return $this->hasMany(StudentInvoice::class, 'academic_year_id');
    }
    public function receipt()
    {
        return $this->hasMany(StudentInvoiceReceipt::class, 'academic_year_id');
    }
    public function sale()
    {
        return $this->hasMany(Sale::class, 'academic_year_id');
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'academic_year_id');
    }
    public function expense()
    {
        return $this->hasMany(Expense::class, 'academic_year_id');
    }
    public function salaryInvoice()
    {
        return $this->hasMany(SalaryInvoice::class, 'academic_year_id');
    }
    public function saleProduct()
    {
        return $this->hasMany(SaleProduct::class, 'academic_year_id');
    }
    public function staffLoan()
    {
        return $this->hasMany(StaffLoan::class, 'academic_year_id');
    }
    
}
