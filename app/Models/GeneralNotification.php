<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralNotification extends Model
{
    use HasFactory;
    protected $table = "general_notification";
    protected $fillable = [
        'subject',
        'message'
    ];
    public function people()
    {
        return $this->hasMany(GeneralNotificationPeople::class, 'general_notification_id');
    }
}
