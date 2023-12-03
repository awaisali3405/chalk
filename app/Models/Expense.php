<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expense';
    protected $fillable = [
        'name',
        'account_type',
        'payment_type',
        'amount',
        'date',
        'description',
        'branch_id',
        'tax',
        'net',
        'file',
        'academic_year_id', 'mode'
    ];
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
    public function accountType()
    {
        return $this->belongsTo(ExpenseAccountType::class, 'account_type');
    }
}
