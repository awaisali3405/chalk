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
    public function invoice()
    {
        $invoice = array();
        foreach ($this->student as $value) {
            $invoice = array_push($invoice, $value->invoice);
        }
        // dd($invoice);
        return $invoice;
    }
    public function name()
    {
        return $this->first_name . " " . $this->last_name;
    }
    public function address()
    {
        $address = "";
        if ($this->res_postal_code) {
            $address .= $this->res_postal_code . ", ";
        }
        if ($this->res_address) {
            $address .= $this->res_address . ", ";
        }
        if ($this->res_second_address) {
            $address .= $this->res_second_address . ", ";
        }
        if ($this->res_third_address) {
            $address .= $this->res_third_address . ", ";
        }
        if ($this->res_town) {
            $address .= $this->res_town . ", ";
        }
        if ($this->res_country) {
            $address .= $this->res_country;
        }


        return $address;
    }
}
