<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $table = "wallet";
    protected $fillable = [
        'branch_id',
        'year_id',
        'student_id',
        'date',
        'mode',
        'amount', 'description','fixed'
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
