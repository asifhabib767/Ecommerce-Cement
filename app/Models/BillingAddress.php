<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    protected $fillable = [
        'address_line1',
        'address_line2',
        'city',
        'zip_code',
        'country_id',
        'is_active',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
