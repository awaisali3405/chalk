<?php

namespace App\Models;

use App\Models\SaleProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sale';
    protected $fillable = [
        'branch_id',
        'year_id',
        'key_stage_id',
        'student_id',
        'date',
        'invoice_id',
        'academic_year_id',
        'mode'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
    public function invoice()
    {
        return $this->belongsTo(StudentInvoice::class, 'invoice_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function year()
    {
        return $this->belongsTo(Year::class, "year_id");
    }
    public function product()
    {
        return $this->hasMany(SaleProduct::class, 'sale_id');
    }
    public function productSum()
    {
        return $this->product()->sum('amount');
    }
    public function keyStage()
    {
        return $this->belongsTo(KeyStage::class, 'key_stage_id');
    }
}
