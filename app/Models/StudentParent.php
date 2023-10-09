<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory;
    protected $table = 'student_parent';
    protected $fillable = [
        'student_id',
        'parent_id'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function parent()
    {
        return $this->belongsTo(Parent::class, 'parent_id');
    }
}
