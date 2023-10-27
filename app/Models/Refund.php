<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;
    protected $table = "refund";
    protected $fillable = [
        'invoice_id',
        'paid_by_cash',
        'paid_by_bank',
    ];
    public function invoice()
    {
        return $this->belongsTo(StudentInvoice::class, 'invoice_id');
    }
}
