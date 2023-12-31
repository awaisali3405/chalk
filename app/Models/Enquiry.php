<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enquiry extends Model
{
    use HasFactory;
    protected $table = 'enquiry';
    protected $fillable = [
        'caller_name',
        'relationship',
        'first_name',
        'last_name',
        'dob',
        'email',
        'phone_no',
        'mobile_no',
        'address',
        'current_school_name',
        'year_id',
        'branch_id',
        'enquiry_date',
        'assessment_date',
        'assessment_time',
        'know_about_us',
        'note',
        'subject',
        'academic_year_id'
    ];
    public function academicYear()
    {
        return $this->belongsTo(AcademicCalender::class, 'academic_year_id');
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
        return $this->hasMany(EnquirySubject::class, 'enquiry_id');
    }
    /**
     * Get all of the upload for the Enquiry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function upload(): HasMany
    {
        return $this->hasMany(EnquiryUpload::class, 'enquiry_id');
    }
    public function student()
    {
        return $this->hasOne(Student::class, 'enquiry_id');
    }
}
