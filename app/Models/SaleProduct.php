<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;
    protected $table = 'sale_product';
    protected $fillable = [
        'product_id',
        'quantity',
        'rate',
        'amount',
        'sale_id',
        'academic_year_id'
    ];
    public function saleProduct()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
