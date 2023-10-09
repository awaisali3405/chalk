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

        'relationship',
        'first_name',
        'last_name',
        'address',
        'contact',
        'email',
        'occupation',
        'post_code'
    ];
    /**
     * The student that belong to the Parent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function student(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_parent');
    }
}
