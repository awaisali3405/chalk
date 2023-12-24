<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
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
    public function uploadDocument()
    {
        return UploadDocument::all();
    }
    public function timeFormat($time)
    {
        return Carbon::parse($time)->format('g:i A');
    }
    public function priceFormat($price)
    {
        return  number_format($price) != $price ? number_format($price, 2) : number_format($price);
    }
    public function ukFormat($date)
    {

        return $date ? Carbon::parse($date)->format('d/m/Y') : '';
    }
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
        })->where('academic_year_id', $academicYear);
    }
    public function transferDue($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Transferred Invoice')->where('is_paid', false)->get();

        return $invoice->sum('amount');
    }
    public function transfer()
    {
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
        $invoiceReceived = $this->receipt($invoice)->get();
        $received = $invoiceReceived->sum('amount');
        return ($received);
    }
    public function depositRegistrationByCash($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Registration'])->pluck('id');
        $invoiceReceived = $this->receipt($invoice)->whereIn('mode', ['Cash', "Cash_Wallet"])->get();
        $received = $invoiceReceived->sum('amount');

        return ($received);
    }
    public function depositRegistrationByBank($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Registration'])->pluck('id');
        $invoiceReceived = $this->receipt($invoice)->whereIn('mode', ['Bank', 'Bank_Wallet'])->get();
        $received = $invoiceReceived->sum('amount');
        return ($received);
    }
    public function depositDue($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Refundable', 'Registration']);
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = StudentInvoiceReceipt::whereIn('invoice_id', $invoice_id)->get();
        $received = $invoiceReceived->sum('amount');
        return ($invoice_sum - $received);
    }
    public function depositRefundable($branch, $academicYear)
    {
        return ($this->depositRefundableByCash($branch, $academicYear) + $this->depositRefundableByBank($branch, $academicYear));
    }
    public function depositRefundableByCash($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Refundable');
        $invoice_id = $invoice->pluck('id');
        $invoiceReceived = $this->receipt($invoice_id)->where('academic_year_id', $academicYear)->whereIn('mode', ['Cash', "Cash_Wallet"])->get();
        $received = $invoiceReceived->sum('amount');
        $refund = $this->totalRefundedByCash($branch, $academicYear);
        return  $received - $refund;
    }
    public function depositRefundableByBank($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Refundable');
        $invoice_id = $invoice->pluck('id');
        $invoiceReceived = $this->receipt($invoice_id)->where('academic_year_id', $academicYear)->whereIn('mode', ['Bank', 'Bank_Wallet'])->get();
        $received = $invoiceReceived->sum('amount');
        $refund = $this->totalRefundedByBank($branch, $academicYear);
        return  $received - $refund;
    }
    public function receipt($invoice_id)
    {
        return  StudentInvoiceReceipt::whereIn('invoice_id', $invoice_id);
    }
    // Resource Fee
    public function resourceFeeReceivedByCash($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Resource Fee');
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('academic_year_id', $academicYear)->whereIn('mode', ['Cash', "Cash_Wallet"])->get();
        $received = $invoiceReceived->sum('amount');
        return ($received);
    }
    public function resourceFeeReceivedByBank($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Resource Fee');
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('academic_year_id', $academicYear)->whereIn('mode', ['Bank', "Bank_Wallet"])->get();
        $received = $invoiceReceived->sum('amount');
        return ($received);
    }
    public function resourceFeeReceived($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Resource Fee', 'Addition Book Invoice']);
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('academic_year_id', $academicYear)->where('mode', '!=', 'transfer')->get();
        $received = $invoiceReceived->sum('amount');
        return ($received);
    }
    public function resourceFeeDue($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Resource Fee', 'Addition Book Invoice']);
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('academic_year_id', $academicYear)->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount') + $invoiceReceived->sum('credit_discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        return ($invoice_sum - ($received + $discount - $late_fee));
    }


    // Fee Monthly/ Weekly

    public function feeDue($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Monthly Fee', 'Weekly Fee', 'Addition Invoice']);
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('academic_year_id', $academicYear)->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount') + $invoiceReceived->sum('credit_discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        // dd(number_format($invoice_sum - ($received + $discount - $late_fee)), ($invoice_sum - ($received + $discount - $late_fee)), number_format($invoice_sum - ($received + $discount - $late_fee)) != ($invoice_sum - ($received + $discount - $late_fee)) ? number_format($invoice_sum - ($received + $discount - $late_fee), 2) : number_format(($invoice_sum - ($received + $discount - $late_fee))));
        return ($invoice_sum - ($received + $discount - $late_fee));
    }
    public function feeReceived($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Monthly Fee', 'Weekly Fee', 'Addition Invoice', "Transferred Invoice"]);
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('academic_year_id', $academicYear)->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        return ($received);
    }
    public function feeReceivedByBank($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Monthly Fee', 'Weekly Fee', 'Addition Invoice', 'Transferred Invoice']);
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('academic_year_id', $academicYear)->whereIn('mode', ['Bank', 'Bank_Wallet'])->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        $wallet = $this->bankWallet($branch, $academicYear);
        return ($received);
    }
    public function wallet($branch, $academicYear)
    {
        $wallet = Wallet::where('academic_year_id', $academicYear);
        if ($branch != -1) {
            $wallet = $wallet->where('branch_id', $branch);
        }

        return $wallet;
    }
    public function bankWallet($branch, $academicYear)
    {
        return $this->wallet($branch, $academicYear)->whereIn('mode', ['Bank', 'Bank_Wallet'])->sum('amount');
    }
    public function cashWallet($branch, $academicYear)
    {
        return $this->wallet($branch, $academicYear)->whereIn('mode', ['Cash', 'Cash_Wallet'])->sum('amount');
    }
    public function feeReceivedByCash($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->whereIn('type', ['Monthly Fee', 'Weekly Fee', 'Addition Invoice', 'Transferred Invoice']);
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('academic_year_id', $academicYear)->whereIn('mode', ['Cash', "Cash_Wallet"])->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        $wallet = $this->cashWallet($branch, $academicYear);
        return ($received);
    }

    public function product()
    {
        return Product::all();
    }
    public function purchaseProduct($branch, $academicYear)
    {
        $purchase = Purchase::where('academic_year_id', $academicYear);
        if ($branch != -1) {
            $purchase = $purchase->where('branch_id', $branch);
        }
        return $purchase;
    }
    public function purchaseProductRate($branch, $academicYear)
    {
        if ($this->purchaseProduct($branch, $academicYear)->sum('quantity')) {

            return $this->purchaseProduct($branch, $academicYear)->sum('discounted_amount') / $this->purchaseProduct($branch, $academicYear)->sum('quantity');
        } else {
            return 0;
        }
    }
    public function productSale($branch, $academicYear)
    {
        $purchase = Sale::where('academic_year_id', $academicYear);
        if ($branch != -1) {
            $purchase = $purchase->where('branch_id', $branch);
        }
        return $purchase;
    }

    public function supplierPurchase($branch, $academicYear)
    {
        $purchase = $this->purchaseProduct($branch, $academicYear)->sum('discounted_amount');
        return $purchase;
    }
    // Available Stock
    public function availableStock($branch, $academicYear)
    {
        $purchase = $this->purchaseProduct($branch, $academicYear)->sum('discounted_amount');
        $purchaseRate = $this->purchaseProductRate($branch, $academicYear);
        $purchaseQuantity = $this->purchaseProduct($branch, $academicYear)->sum('quantity');
        $saleQuantity = $this->resourceSaleQuantity($branch, $academicYear);
        $saleTotal = $this->resourceSale($branch, $academicYear);
        $remainingProduct = $purchaseQuantity - $saleQuantity;
        // dd($purchaseRate, $remainingProduct, number_format($purchaseRate, 2) * $remainingProduct);

        return number_format($purchaseRate, 2) * $remainingProduct;
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
    public function resourceSaleQuantity($branch, $academicYear)
    {
        $salesProduct = $this->productSale($branch, $academicYear)->get();
        $quantity = 0;
        foreach ($salesProduct as $value) {
            $quantity += $value->product->sum('quantity');
        }
        // dd();
        return  $quantity;
    }
    public function resourceDue($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Sale Invoice');
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('academic_year_id', $academicYear)->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount') + $invoiceReceived->sum('credit_discount');
        $late_fee = $invoiceReceived->sum('late_fee');
        // dd();
        return ($invoice_sum - ($received + $discount - $late_fee));
    }

    public function resourceReceived($branch, $academicYear)
    {
        $invoice = $this->invoice($branch, $academicYear)->where('type', 'Sale Invoice');
        $invoice_id = $invoice->pluck('id');
        $invoice_sum = $invoice->get()->sum('amount');
        $invoiceReceived = $this->receipt($invoice_id)->where('academic_year_id', $academicYear)->get();
        $received = $invoiceReceived->sum('amount');
        $discount = $invoiceReceived->sum('discount');
        $late_fee = $invoiceReceived->sum('late_fee');

        return ($received);
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
        $loanPaid = $this->totalSalaryLoan($branch, $academicYear);
        $resourceFeeReceived = $this->resourceFeeReceived($branch, $academicYear);
        $availableStock = $this->availableStock($branch, $academicYear);
        $transfer = $this->transferDue($branch, $academicYear);
        $dbsReceived = $this->dbsReceived($branch, $academicYear);
        return  (float) $feeReceived + (float) $depositReceived +  (float) $resourceReceived +  (float) $resourceFeeReceived + (float) $availableStock + (float)$loanPaid + (float)$feeDue + (float)$depositDue + (float)$resourceFeeDue + (float)$resourceDue + (float)$transfer + (float)$dbsReceived;
    }
    //Cash and Bank
    public function totalCashReceived($branch, $academicYear)
    {
        $feeReceivedByCash = $this->feeReceivedByCash($branch, $academicYear);
        $depositRegistrationByCash = $this->depositRegistrationByCash($branch, $academicYear);
        $depositRefundableByCash = $this->depositRefundableByCash($branch, $academicYear);
        $walletByCash = $this->resourceFeeReceivedByCash($branch, $academicYear);
        return $feeReceivedByCash + $depositRegistrationByCash + $depositRefundableByCash + $walletByCash;
    }
    public function totalBankReceived($branch, $academicYear)
    {
        $feeReceivedByBank = $this->feeReceivedByBank($branch, $academicYear);
        $depositRegistrationByBank = $this->depositRegistrationByBank($branch, $academicYear);
        $depositRefundableByBank = $this->depositRefundableByBank($branch, $academicYear);
        $walletByBank = $this->resourceFeeReceivedByBank($branch, $academicYear);
        return $feeReceivedByBank + $depositRegistrationByBank + $depositRefundableByBank + $walletByBank;
    }
    // Total Refunded
    public function refundByCash($branch, $academicYear)
    {
        return Refund::where('paid_by_cash', true)->whereHas('invoice', function ($query) use ($branch, $academicYear) {
            if ($branch != -1) {

                $query->where('branch_id', $branch);
            }
        })->where('academic_year_id', $academicYear);
    }
    public function refundByBank($branch, $academicYear)
    {
        return Refund::where('paid_by_bank', true)->whereHas('invoice', function ($query) use ($branch, $academicYear) {
            if ($branch != -1) {

                $query->where('branch_id', $branch);
            }
        })->where('academic_year_id', $academicYear);
    }
    public function refund($branch, $academicYear)
    {
        return Refund::whereHas('invoice', function ($query) use ($branch, $academicYear) {
            if ($branch != -1) {

                $query->where('branch_id', $branch);
            }
        })->where('academic_year_id', $academicYear)->where('paid_by_bank', true)->orWhere('paid_by_cash', true);
    }
    public function refundable($branch, $academicYear)
    {
        $refund = Refund::where('academic_year_id', $academicYear)->where('paid_by_bank', false)->where('paid_by_cash', false);

        if ($branch != -1) {
            $refund = $refund->where('branch_id', $branch);
        }
        return $refund;
    }
    public function totalRefundable($branch, $academicYear)
    {
        $total = 0;
        foreach (self::refundable($branch, $academicYear)->get() as  $value) {
            $total += $value->invoice->amount;
        }
        return $total;
    }
    public function totalRefunded($branch, $academicYear)
    {
        $total = 0;
        foreach ($this->refund($branch, $academicYear)->get() as $value) {
            $total += $value->invoice->amount;
        }
        return $total;
    }
    public function totalRefundedByBank($branch, $academicYear)
    {
        $total = 0;
        foreach ($this->refundByBank($branch, $academicYear)->get() as $value) {
            $total += $value->invoice->amount;
        }
        return $total;
    }
    public function totalRefundedByCash($branch, $academicYear)
    {
        $total = 0;
        foreach ($this->refundByCash($branch, $academicYear)->get() as $value) {
            $total += $value->invoice->amount;
        }
        return $total;
    }
    // Refunded End
    // Expense
    public function expense()
    {
        return Expense::where('id', '!=', 0);
    }
    public function dbs()
    {
        return StaffRequest::where('id', '!=', 0);
    }
    public function totalDbs($branch, $academicYear)
    {
        $dbs = $this->dbs()->where('academic_year_id', $academicYear);
        if ($branch != -1) {
            $dbs = $dbs->where('branch_id', $branch);
        }
        // dd($dbs->get());
        return $dbs->sum('request_amount');
    }
    public function totalExpense($branch, $academicYear)
    {
        if ($branch == -1) {
            // dd($this->expense()->where("academic_year_id",$academicYear)->get());
            $expense = $this->expense()->where('academic_year_id', $academicYear)->get()->sum('amount');
            // return $expense;
        } else {
            $expense = $this->expense()->where('branch_id', $branch)->where('created_at', ">=", $this->getAcademicYear($academicYear)->start_date)->where('created_at', '<=', $this->getAcademicYear($academicYear))->sum('amount');
            // $dbs = $this->totalDbs($branch, $academicYear);
        }
        $dbs = $this->totalDbs($branch, $academicYear);
        return $expense + $dbs;
    }
    public function staffPay($branch, $academicYear)
    {
        $receipt = StaffReceipt::where('academic_year_id', $academicYear);
        if ($branch != -1) {
            $receipt = $receipt->where('branch_id', $branch);
        }
        return $receipt->get();
    }
    // HMRC
    public function payableHMRC($branch, $academicYear)
    {
        $tax = $this->staffPay($branch, $academicYear)->sum('tax');
        $ni = $this->staffPay($branch, $academicYear)->sum('ni');
        $pension = $this->staffPay($branch, $academicYear)->sum('pension');
        $empNi = $this->staffPay($branch, $academicYear)->sum('employer_ni');
        $empPension = $this->staffPay($branch, $academicYear)->sum('employer_pension');
        $studentLoan = $this->staffPay($branch, $academicYear)->sum('student_loan');
        return $tax + $ni + $pension + $empNi + $empPension + $studentLoan;
    }
    public function paidHMRC($branch, $academicYear)
    {
        $amount = $this->payableHMRC($branch, $academicYear);
        return $amount;
    }
    public function dbsReceived($branch, $academicYear)
    {
        return $this->staffPay($branch, $academicYear)->sum('dbs');
    }
    // Week
    public function week($date)
    {


        if ($date) {

            $year = AcademicCalender::whereDate('start_date', '<=', $date)->whereDate('end_date', '>=', $date)->first();
            if ($year) {
                return Carbon::parse($year->start_date)->diffInWeeks(Carbon::parse($date)) + 1;
            } else {

                return 0;
            }
        } else {
            return 0;
        }
    }
    public function dateWeek($week)
    {
        $date = Carbon::parse($this->session()->start_date)->addWeeks($week);
        return $date;
    }
    public function calculateTax($tax, $price)
    {
        // dd($tax, $price);
        return $price - ($price / (100 + $tax)) * 100;
    }
    // Staff
    public function staff($branch, $academicYear)
    {
        if ($branch != -1) {
            return Staff::where('branch_id', $branch);
        } else {
            return Staff::where('id', '!=', 0);
        }
    }
    public function totalSalary($branch, $academicYear)
    {
        $total = 0;
        $staff = $this->staff($branch, $academicYear)->get();
        // dd($staff);
        foreach ($staff as $key => $value) {
            if ($value->salary_type == 'Monthly') {

                $total +=  $value->invoice()->where('from_date', ">=", $this->getAcademicYear($academicYear)->start_date)->where('from_date', '<=', $this->getAcademicYear($academicYear)->end_date)->where('is_paid', 0)->get()->sum('amount');
            } else {
                $pay = $this->totalAttendancePay($value, $academicYear);
                $total += $pay;
            }
        }
        return $total;
    }
    public function totalAttendancePay($staff, $academicYear)
    {
        $total = 0;
        $attendance = $staff->attendance()->where("academic_year_id", $academicYear)->where('is_paid', 0)->get();
        foreach ($attendance as $key => $value) {
            $total += $value->amount();
        }
        return $total;
    }
    public function totalSalaryPaid($branch, $academicYear)
    {
        $total = 0;
        $staff = $this->staff($branch, $academicYear)->get();
        foreach ($staff as $value) {
            $total += $this->totalPaid($value, $academicYear);
        }
        return $total;
    }
    public function totalPaid($staff, $academicYear)
    {
        $total = 0;
        $pay = $staff->receipt()->where("academic_year_id", $academicYear)->get();
        foreach ($pay as $value) {
            $total += $value->total() + $value->loan;
        }
        return $total;
    }
    public function totalSalaryLoan($branch, $academicYear)
    {
        $total = 0;
        $staff = $this->staff($branch, $academicYear)->get();
        foreach ($staff as $value) {
            $total += $this->totalLoan($value, $academicYear);
        }
        return $total;
    }
    public function totalLoan($staff, $academicYear)
    {
        $total = 0;
        $pay = $staff->receipt()->where("academic_year_id", $academicYear)->get();
        foreach ($pay as $value) {
            $total += $value->loan;
        }
        return $total;
    }

    // Loan
    public function remainingLoan($branch, $academicYear)
    {
        return $this->givenLoan($branch, $academicYear) - $this->totalSalaryLoan($branch, $academicYear);
    }
    public function givenLoan($branch, $academicYear)
    {
        if ($branch != -1) {
            return StaffLoan::where('branch_id', $branch)->where('academic_year_id', $academicYear)->get()->sum('amount');
        } else {
            return StaffLoan::where('academic_year_id', $academicYear)->get()->sum('amount');
        }
    }
    public function studentRequest()
    {
        return Student::where('active', false)->whereHas('promotionDetail', function ($query) {
            $query->where('academic_year_id', $this->session()->id);
        })->get();
    }
    public function studentDisable()
    {
        return Student::where('is_disable', true)->whereHas('promotionDetail', function ($query) {
            $query->where('academic_year_id', $this->session()->id);
        })->get();
    }
    public function studentBankWallet($branch, $academicYear)
    {
        $wallet = Student::where('academic_year_id', $academicYear);
        if ($branch != -1) {
            $wallet = $wallet->where('branch_id', $branch);
        }
        return $wallet->sum('bank_balance');
    }
    public function studentCashWallet($branch, $academicYear)
    {
        $wallet = Student::where('academic_year_id', $academicYear);
        if ($branch != -1) {
            $wallet = $wallet->where('branch_id', $branch);
        }
        return $wallet->sum('cash_balance');
    }
    public function studentWallet($branch, $academicYear)
    {
        return $this->studentBankWallet($branch, $academicYear) + $this->studentCashWallet($branch, $academicYear);
    }
}
