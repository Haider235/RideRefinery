<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventParticipantLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_registration_id',
        'latitude',
        'longitude',
    ];

    public function registration()
    {
        return $this->belongsTo(EventRegistration::class, 'event_registration_id');
    }
}
