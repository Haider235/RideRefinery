<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'zip',
        'payment_method',
        'account_number',
        'account_name',
        'card_number',
        'cvv',
        'expiry',
        'amount',
        'screenshot_path',
        'status',
    ];
}
