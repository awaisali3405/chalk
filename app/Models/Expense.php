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
        'file'
    ];
    public function accountType()
    {
        return $this->belongsTo(ExpenseAccountType::class, 'account_type');
    }
}
