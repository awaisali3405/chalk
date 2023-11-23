<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchase';
    protected $fillable = [
        'supplier_id',
        'branch_id',
        'year_id',
        'key_stage_id',
        'product_id',
        'quantity',
        'rate',
        'amount',
        'date', 'mode', 'academic_year_id'
    ];
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
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
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function keyStage()
    {
        return $this->belongsTo(KeyStage::class, 'key_stage_id');
    }
}
