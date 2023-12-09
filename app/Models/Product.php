<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'branch_id',
        'year_id'
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'product_id');
    }
    public function saleProduct()
    {
        return $this->hasMany(SaleProduct::class, 'product_id');
    }
    public function remainingProduct()
    {
        return $this->purchase->sum('quantity') - $this->saleProduct()->sum('quantity');
    }
    public function remainingAmount()
    {
        return $this->rate() * $this->remainingProduct();
    }
    public function rate()
    {
        $rate = 0;
        $quantity = $this->purchase->sum('quantity');
        $amount = $this->purchase->sum('discounted_amount');
        $rate = $amount / $quantity;
        return auth()->user()->priceFormat($rate);
    }
}
