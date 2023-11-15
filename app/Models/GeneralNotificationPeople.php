<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralNotificationPeople extends Model
{
    use HasFactory;
    protected $table = 'general_notification_people';
    protected $fillable = [
        'general_notification_id',
        'name',
        'type'
    ];
    public function generalNotification()
    {
        return $this->belongsTo(GeneralNotification::class, 'general_notification_id');
    }
}
