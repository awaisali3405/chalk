<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashFlow extends Model
{
    use HasFactory;
    protected $table = 'cash_flow';
    protected $fillable = [
        'date',
        'branch_id',
        'description',
        'mode',
        'type',
        'in',
        'out',
        'academic_year_id'
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
