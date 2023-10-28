<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseAccountType extends Model
{
    use HasFactory;
    protected $table = 'expense_account_type';
    protected $fillable = [
        'name',
        'type',
        'active',
        'branch_id'
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
