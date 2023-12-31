<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = [
        'enquiry_id',
        'profile_pic',
        'first_name',
        'last_name',
        'middle_name',
        'phone_no',
        'gender',
        'nationality',
        'main_language',
        'other_language',
        'dob',
        'current_school_name',
        'current_year',
        'branch_id',
        'payment_period',
        'year_id',
        'key_stage_id',
        'lesson_type',
        'admission_date',
        'deposit',
        'registration_fee',
        'annual_resource_fee',
        'resource_discount',
        'exercise_book_fee',
        'fee',
        'fee_discount',
        'note',
        'note_files',
        'ethic_group',
        'religion',
        'o_full_name_1',
        'o_work_phone_1',
        'o_relationship_1',
        'o_mobile_phone_1',
        'o_work_place_1',
        'o_full_name_2',
        'o_work_phone_2',
        'o_relationship_2',
        'o_mobile_phone_2',
        'o_work_place_2',
        'e_full_name_1',
        'e_work_phone_1',
        'e_relationship_1',
        'e_mobile_phone_1',
        'e_contact_info_1',
        'e_full_name_2',
        'e_work_phone_2',
        'e_relationship_2',
        'e_mobile_phone_2',
        'e_contact_info_2',
        'is_disable',
        'disorder_detail',
        'signature_person',
        'know_about_us',
        'feedback',
        'total_fee',
        'tax',
        'place_of_birth',
        'parent_subject',
        'active',
        'promotion_date',
        'is_promoted',
        'balance',
        'roll_no',
        'cash_balance',
        'bank_balance',
        'credit_note',
        'disable',
        'debt_collection'
    ];
    public function depositInvoice()
    {
        return $this->hasOne(StudentInvoice::class, 'student_id')->where('type', 'Refundable')->first();
    }
    public function referred()
    {
        return $this->hasMany(StudentReference::class, 'reference_student');
    }
    public function reference()
    {
        return $this->hasOne(StudentReference::class, 'referred_student');
    }
    public function wallet()
    {
        return $this->hasMany(Wallet::class, 'student_id')->where('academic_year_id', auth()->user()->session()->id);
    }
    public function currentRollNo()
    {
        return !is_null($this->promotionDetail()->where('academic_year_id', auth()->user()->session()->id)->first()) ? $this->promotionDetail()->where('academic_year_id', auth()->user()->session()->id)->first()->roll_no : $this->roll_no;
    }
    public function currentYear()
    {
        return !is_null($this->promotionDetail()->where('academic_year_id', auth()->user()->session()->id)->first()) ? $this->promotionDetail()->where('academic_year_id', auth()->user()->session()->id)->first()->toYear : $this->year;
    }
    public function promotionDetail()
    {
        return $this->hasMany(StudentPromotionDetail::class, 'student_id');
    }
    public function monthlyFee()
    {
        // dd(((int)$this->total_fee * str_contains($this->year->name, "11") ? 49 : 52) / 12, $this->total_fee * 52 / 12);
        return number_format(($this->total_fee * (str_contains($this->year->name, "11") ? 49 : 52)) / 12, 2);
    }
    public function name()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
    public function keyStage()
    {

        return $this->belongsTo(KeyStage::class, 'key_stage_id');
    }
    /**
     * Get the branch that owns the Enquiry
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    /**
     * Get all of the enquirySubject for the Enquiry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enquirySubject(): HasMany
    {
        return $this->hasMany(EnquirySubject::class, 'student_id');
    }
    public function yearSubject()
    {
        return $this->hasMany(EnquirySubject::class, 'student_id')->where('year_id', $this->currentYear()->id)->where('academic_year_id', auth()->user()->session()->id);
    }
    public function InvoiceSubject($invoice)
    {

        return $this->hasMany(EnquirySubject::class, 'student_id')->where('year_id', $this->currentYear()->id)->where('academic_year_id', auth()->user()->session()->id)->where('invoice_id', $invoice)->get();
    }
    public function resourceInvoiceSubject($invoice)
    {
        return $this->hasMany(EnquirySubject::class, 'student_id')->where('year_id', $this->currentYear()->id)->where('academic_year_id', auth()->user()->session()->id)->where('resource_invoice_id', $invoice)->get();
    }
    /**
     * Get all of the upload for the Enquiry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function upload(): HasMany
    {
        return $this->hasMany(EnquiryUpload::class, 'student_id');
    }

    public function parents()
    {
        return $this->belongsToMany(Parents::class, 'student_parent', 'student_id', 'parent_id');
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }
    public function attendanceStatus($subject, $date)
    {
        // dd($date);
        $attend = $this->attendance()->where('subject_id', $subject)->where('date', $date)->first();
        if ($attend) {

            return $attend->status;
        } else {
            return 0;
        }
    }
    public function totalAttendance($from, $to)
    {
        if ($from || $to) {

            return $this->attendance()->where('date', ">=", $from)->where('date', '<=', $to);
        } else {
            return $this->attendance();
        }
    }
    public function lastInvoice()
    {
        return $this->hasMany(StudentInvoice::class, 'student_id')->where('academic_year_id', '<', auth()->user()->session()->id);
    }
    public function invoice()
    {
        return $this->hasMany(StudentInvoice::class, 'student_id')->where('academic_year_id', auth()->user()->session()->id);
    }
    public function attendanceNote($subject, $date)
    {
        // dd($date);
        $attend = $this->attendance()->where('subject_id', $subject)->where('date', $date)->first();
        if ($attend) {

            return $attend->note;
        } else {
            return "";
        }
    }
    public function hasOneOnOne($invoice)
    {
        return $this->yearSubject->where("lesson_type_id ", 2)->where('invoice_id', $invoice)->count() > 0 ? true : false;
    }
    public function oneOnOneSubject($invoice)
    {

        return $this->yearSubject()->where('lesson_type_id', 2)->where('invoice_id', $invoice)->get();
    }
    public function normalSubject($invoice)
    {
        return $this->yearSubject()->where('lesson_type_id', 1)->where('invoice_id', $invoice)->get();
    }
    public function isFullyPaid()
    {
        $paid = true;
        foreach ($this->invoice as $value) {
            if (!$value->is_paid) {
                $paid = false;
            }
        }
        // dd($paid);
        return $paid;
    }
    public function totalAmount()
    {
        return $this->invoice->sum('amount');
    }
    public function paid()
    {
        $paid = 0;
        foreach ($this->invoice as $value) {
            $paid += $value->paidAmount();
        }
        return $paid;
    }
    public function due()
    {
        $due = $this->totalAmount() - $this->paid();
        return $due;
    }
    public function debitBroughtForward()
    {
        $debit = 0;
        $credit = 0;
        $balance = 0;
        foreach ($this->lastInvoice as $key => $value) {
            $debit += $value->amount;
            $balance += $value->amount;
            foreach ($value->lastReceipt as $value1) {
                // dd($balance
                $credit += $value1->amount;
                $balance -= $value1->amount;
            }
        }
        return ['balance' => $balance, 'credit' => $credit, 'debit' => $debit];
    }
    public function lastYear()
    {

        return !is_null($this->promotionDetail()->where('academic_year_id', auth()->user()->session()->id - 1)->first()) ? $this->promotionDetail()->where('academic_year_id', auth()->user()->session()->id - 1)->first()->toYear : $this->year;
    }
    public function previousYearRecord()
    {
        return $this->hasMany(EnquirySubject::class, 'student_id')->where('year_id', $this->currentYear()->id)->where('academic_year_id', auth()->user()->session()->id - 1);
    }
}
