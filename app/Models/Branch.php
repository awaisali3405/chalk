<?php

namespace App\Models;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branch';
    protected $fillable = [
        'name',
        'account_number',
        'bank_name',
        'short_code',
        'phone_number',
        'email',
        'address',
        'res_address',
        'res_second_address',
        'res_third_address',
        'res_town',
        'res_country',
        'res_postal_code',
        'company_number',
        'tax_type',
        'tax'
    ];
    public function loan()
    {
        return $this->hasMany(StaffLoan::class, "branch_id");
    }
    public function receipt()
    {
        $id = $this->id;
        $receipt = StudentInvoiceReceipt::whereHas('invoice', function ($query) use ($id) {
            $query->whereHas('student', function ($query) use ($id) {
                $query->where('branch_id', $id);
            });
        });
        return $receipt;
    }
    public function expense()
    {
        $expense = Expense::where('branch_id', $this->id);
        return $expense;
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'branch_id');
    }
    public function sale()
    {
        return $this->hasMany(Sale::class, 'branch_id');
    }
    public function staff()
    {
        return $this->hasMany(Staff::class, 'branch_id');
    }
    public function wallet()
    {
        return $this->hasMany(Wallet::class, 'branch_id');
    }
    public function cashFlow()
    {
        return $this->hasMany(CashFlow::class, 'branch_id');
    }
}
