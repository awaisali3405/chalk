<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Parents extends Model
{
    use HasFactory;
    protected $table = 'parent';
    protected $fillable = [

        'last_name',
        'first_name',
        'given_name',
        'gender',
        'relationship',
        'emp_status',
        'company_name',
        'work_phone_number',
        'mobile_number',
        'email',
        'signature',
        'signature_date',
        'res_address',
        'res_second_address',
        'res_third_address',
        'res_town',
        'res_country',
        'res_postal_code',
        'user_id'
    ];
    /**
     * The student that belong to the Parent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function student(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_parent', 'parent_id', 'student_id');
    }
}
