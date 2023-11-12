<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffReceipt extends Model
{
    use HasFactory;
    protected $table = 'staff_receipt';

    protected $fillable = [
        'staff_id',
        'from_date',
        'to_date',
        'salary',
        'deduction',
        'tax',
        'ssp',
        'ni',
        'dbs',
        'pension',
        'loan',
        'total',
        'date',
        'note',
        'mode',
    ];
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
