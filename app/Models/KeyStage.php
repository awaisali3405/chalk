<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyStage extends Model
{
    use HasFactory;
    protected $table = "key_stage";
    protected $fillable = [
        'name'
    ];
}
