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
        'pic'
    ];
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }
}
