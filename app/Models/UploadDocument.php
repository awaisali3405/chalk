<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadDocument extends Model
{
    use HasFactory;
    protected $table = 'upload_document';
    protected $fillable = [
        'name'
    ];
}
