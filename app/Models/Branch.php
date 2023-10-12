<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branch';
    protected $fillable = [
        'name',
        'account_number',
        'bank_name',
        'short_code',
        'phone_number',
        'email',
        'address',
    ];
}
