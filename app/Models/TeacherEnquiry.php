<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherEnquiry extends Model
{
    use HasFactory;
    protected $table = "teacher_enquiry";
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'designation',
        'national_insurance_number',
        'mobile',
        'phone',
        'home_telephone',
        'email',
        'postal_code',
        'address',
        'branch_id',
        'pic',
        'department_id',
        'cv_check',
        'dbs_check',
        'password_check',
        'visa_check',
        'n1_check',
        'document_check',
        'refrence_check',
        'address_check',
        'hs_check',
        'application_check',
        'work_check',
        'rule_responsibility_check',
        'cv_document',
        'dbs_document',
        'password_document',
        'visa_document',
        'n1_document',
        'document_document',
        'refrence_document',
        'address_document',
        'hs_document',
        'application_document',
        'work_document',
        'rule_responsibility_document',
        'passport_date',
        'visa_date',
        'year_id'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function subject()
    {
        return $this->hasMany(TeacherSubject::class, 'teacher_enquiry_id');
    }
    public function upload()
    {
        return $this->hasMany(TeacherUpload::class, 'teacher_enquiry_id');
    }
    public function interview()
    {
        return $this->hasMany(TeacherEnquiryInterview::class, 'teacher_enquiry_id');
    }
}
