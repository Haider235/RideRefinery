<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;

    // Table name (optional, only if different from pluralized form)
    protected $table = 'support_tickets';

    // Fields that can be mass-assigned
    protected $fillable = [
        'name',
        'email',
        'issue',
    ];
}
