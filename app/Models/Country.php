<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'code',
        'phone_code',
        'flag_image',
        'currency',
        'currency_symbol'
    ];
}
