<?php

namespace App\Models;

use App\Models\Board;
use App\Models\Paper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnquirySubject extends Model
{
    use HasFactory;
    protected $table = 'enquiry_subject';
    protected $fillable = [
        'subject_id',
        'board_id',
        'paper_id',
        'science_type_id',
        'enquiry_id',
        'student_id',
        'lesson_type_id',
        'rate_per_hr',
        'no_hr_weekly',
        'amount',
        'year_id'
    ];
    /**
     * Get the subject that owns the EnquirySubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    /**
     * Get the branch that owns the EnquirySubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class, 'board_id');
    }
    /**
     * Get the paper that owns the EnquirySubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paper(): BelongsTo
    {
        return $this->belongsTo(Paper::class, 'paper_id');
    }
    /**
     * Get the scienceType that owns the EnquirySubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scienceType(): BelongsTo
    {
        return $this->belongsTo(ScienceType::class, 'science_type_id');
    }
    /**
     * Get the enquiry that owns the EnquirySubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enquiry(): BelongsTo
    {
        return $this->belongsTo(Enquiry::class, 'enquiry_id');
    }
    public function lessonType()
    {
        return $this->belongsTo(LessonType::class, 'lesson_type_id');
    }
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
}
