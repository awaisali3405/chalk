<?php

namespace App\Models;

use App\Models\Board;
use App\Models\Paper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnquiryUpload extends Model
{
    use HasFactory;
    protected $table = 'enquiry_upload';
    protected $fillable = [
        'student_id',
        'file',
        'file_name',
        'document_name',

        'enquiry_id',
    ];

    public function enquiry(): BelongsTo
    {
        return $this->belongsTo(Enquiry::class, 'enquiry_id');
    }
}
