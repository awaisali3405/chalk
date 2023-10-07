<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subject';
    protected $fillable = [
        'name',
        'year_id',
        'rate'
    ];
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
}
