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
    ];
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
        return $this->attendance()->where('date', ">=", $from)->where('date', '<=', $to);
    }
    public function invoice()
    {
        return $this->hasMany(StudentInvoice::class, 'student_id');
    }
}
