<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function session()
    {
        return AcademicCalender::where('active', true)->first();
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function parent()
    {
        return $this->hasOne(Parents::class, 'user_id');
    }

    public function getAcademicYear($id)
    {
        return AcademicCalender::find($id);
    }
    public function invoice($branch, $academicYear)
    {
        return StudentInvoice::whereHas('student', function ($query) use ($branch, $academicYear) {
            if ($branch != -1) {

                $query->where('branch_id', $branch);
            }
        })->where('created_at', ">=", $this->getAcademicYear($academicYear)->start_date)->where('created_at', '<=', $this->getAcademicYear($academicYear)->end_date);
    }
    public function deposit($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Refundable')->get();
        // dd($invoice);
        return $invoice->sum('amount');
    }
    public function depositReceived($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Refundable', 'Registration'])->pluck('id');
        $invoiceReceived = StudentInvoiceReceipt::whereIn('invoice_id', $invoice)->get();
        $received = $invoiceReceived->sum('amount');

        return number_format($received);
    }
    public function depositRegistrationByCash($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Registration'])->pluck('id');
        $invoiceReceived = $this->receipt($invoice)->where('mode', 'Cash')->get();
        $received = $invoiceReceived->sum('amount');

        return number_format($received);
    }
    public function depositRegistrationByBank($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Registration'])->pluck('id');
        $invoiceReceived = $this->receipt($invoice)->where('mode', 'Bank')->get();
        $received = $invoiceReceived->sum('amount');

        return number_format($received);
    }
    public function depositDue($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Refundable', 'Registration']);
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = StudentInvoiceReceipt::whereIn('invoice_id', $invoice_id)->get();
        $received = $invoiceReceived->sum('amount');

        return number_format($invoice_sum - $received);
    }
    public function depositRefundable($branch, $academicYear)
    {

        // dd($invoice_sum, $received);
        return  $this->depositRefundableByCash($branch, $academicYear) + $this->depositRefundableByBank($branch, $academicYear);
    }
    public function depositRefundableByCash($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Refundable');
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('mode', 'Cash')->get();
        $received = $invoiceReceived->sum('amount');
        // dd($invoice_sum, $received);
        return  $received;
    }
    public function depositRefundableByBank($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Refundable');
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('mode', 'Bank')->get();
        $received = $invoiceReceived->sum('amount');
        // dd($invoice_sum, $received);
        return  $received;
    }
    public function receipt($invoice_id)
    {
        return  StudentInvoiceReceipt::whereIn('invoice_id', $invoice_id);
    }




    // Resource Fee
    public function resourceFeeReceived($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Resource Fee');
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->get();
        $received = $invoiceReceived->sum('amount');
        // $discount = $invoiceReceived->sum('discount');
        // $lateFee = $invoiceReceived->sum('late_fee');
        return number_format($received);
    }
    public function resourceFeeDue($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Resource Fee');
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        return number_format($invoice_sum - ($received + $discount - $late_fee));
    }


    // Fee Monthly/ Weekly

    public function feeDue($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Monthly Fee', 'Weekly Fee', 'Addition Invoice']);
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        return number_format($invoice_sum - ($received + $discount - $late_fee));
    }
    public function feeReceived($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Monthly Fee', 'Weekly Fee', 'Addition Invoice']);
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('mode', 'Cash')->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        return number_format($received);
    }
    public function feeReceivedByBank($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Monthly Fee', 'Weekly Fee', 'Addition Invoice']);
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('mode', 'Bank')->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        return number_format($received);
    }
    public function feeReceivedByCash($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Monthly Fee', 'Weekly Fee', 'Addition Invoice']);
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('mode', 'Cash')->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        return number_format($received);
    }

    public function product()
    {
        return Product::all();
    }
    public function purchaseProduct($branch, $academicYear)
    {
        $purchase = Purchase::where('created_at', ">=", $this->getAcademicYear($academicYear)->start_date)->where('created_at', '<=', $this->getAcademicYear($academicYear)->end_date);
        if ($branch != -1) {
            $purchase = $purchase->where('branch_id', $branch);
        }
        return $purchase;
    }
    public function productSale($branch, $academicYear)
    {
        $purchase = Sale::where('created_at', ">=", $this->getAcademicYear($academicYear)->start_date)->where('created_at', '<=', $this->getAcademicYear($academicYear)->end_date);
        if ($branch != -1) {
            $purchase = $purchase->where('branch_id', $branch);
        }
        return $purchase;
    }

    public function supplierPurchase($branch, $academicYear)
    {
        $purchase = $this->purchaseProduct($branch, $academicYear)->sum('amount');
        return $purchase;
    }
    // Available Stock
    public function availableStock($branch, $academicYear)
    {
        $purchase = $this->purchaseProduct($branch, $academicYear)->sum('amount');
        $saleTotal = $this->resourceSale($branch, $academicYear);
        // dd();
        return $purchase - $saleTotal;
    }
    public function resourceSale($branch, $academicYear)
    {
        $salesProduct = $this->productSale($branch, $academicYear)->get();
        $saleTotal = 0;
        foreach ($salesProduct as $value) {
            $saleTotal += $value->productSum();
        }
        // dd();
        return  $saleTotal;
    }
    public function resourceDue($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Sale Invoice');
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        // dd();
        return  number_format($invoice_sum - ($received + $discount - $late_fee));
    }

    public function resourceReceived($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Sale Invoice');
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        // dd();
        return  number_format($received);
    }
    public function totalAsset($branch, $academicYear)
    {
        $feeDue = $this->feeDue($branch, $academicYear);
        $feeReceived = $this->feeReceived($branch, $academicYear);
        $depositReceived = $this->depositReceived($branch, $academicYear);
        $depositDue = $this->depositDue($branch, $academicYear);
        $resourceReceived = $this->resourceReceived($branch, $academicYear);
        $resourceDue = $this->resourceDue($branch, $academicYear);
        $resourceFeeDue = $this->resourceFeeDue($branch, $academicYear);
        $resourceFeeReceived = $this->resourceFeeReceived($branch, $academicYear);
        $availableStock = $this->availableStock($branch, $academicYear);
        return $feeDue + $feeReceived + $depositReceived + $depositDue + $resourceReceived + $resourceDue + $resourceFeeReceived + $resourceFeeDue + $availableStock;
    }
    // public function totalLiability(){

    //     return
    // }




    //Cash and Bank
    public function totalCashReceived($branch, $academicYear)
    {
        $feeReceivedByCash = $this->feeReceivedByCash($branch, $academicYear);
        $depositRegistrationByCash = $this->depositRegistrationByCash($branch, $academicYear);
        $depositRefundableByCash = $this->depositRefundableByCash($branch, $academicYear);
        return $feeReceivedByCash + $depositRegistrationByCash + $depositRefundableByCash;
    }
    public function totalBankReceived($branch, $academicYear)
    {
        $feeReceivedByBank = $this->feeReceivedByBank($branch, $academicYear);
        $depositRegistrationByBank = $this->depositRegistrationByBank($branch, $academicYear);
        $depositRefundableByBank = $this->depositRefundableByBank($branch, $academicYear);
        return $feeReceivedByBank + $depositRegistrationByBank + $depositRefundableByBank;
    }
}
