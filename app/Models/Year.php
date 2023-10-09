<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $table = "year";

    protected $fillable = [
        'name',
        'key_stage_id'
    ];
    public function keyStage()
    {
        return $this->belongsTo(KeyStage::class, 'key_stage_id');
    }
    public function student()
    {
        return $this->hasMany(Student::class, 'year_id');
    }
    public function subject()
    {
        return $this->hasMany(Subject::class, 'subject_id');
    }
}
