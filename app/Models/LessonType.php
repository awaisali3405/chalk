<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonType extends Model
{
    use HasFactory;
    protected $table = 'lesson_type';
    protected $fillable = ['name'];
}
