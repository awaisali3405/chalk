<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherUpload extends Model
{
    use HasFactory;
    protected $table = 'teacher_upload';
    protected $fillable = [
        'document_name',
        'file_name',
        'enquiry_date',
        'teacher_enquiry_id'
    ];
    public function teacherEnquiry()
    {
        return $this->belongsTo(TeacherEnquiry::class, 'teacher_enquiry_id');
    }
}
