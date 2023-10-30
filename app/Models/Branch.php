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
        'res_address',
        'res_second_address',
        'res_third_address',
        'res_town',
        'res_country',
        'res_postal_code',
        'company_number',
        'tax_type',
        'tax'
    ];
}
