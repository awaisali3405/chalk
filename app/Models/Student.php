<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = [
        'profile_pic',
        'first_name',
        'last_name',
        'dob',
        'email',
        'phone_no',
        'post_code',
        'ethic_group',
        'religion',
        'home_language',
        'current_school_name',
        'year_id',
        'key_stage_id',
        'lesson_type',
        'branch_id',
        'payment_period',
        'admission_date',
        'deposit',
        'registration_fee',
        'annual_resource_fee',
        'resource_discount',
        'exercise_book_fee',
        'fee',
        'fee_discount',
        'learning',
        'medical',
        'awareness',
        'note'
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
}
