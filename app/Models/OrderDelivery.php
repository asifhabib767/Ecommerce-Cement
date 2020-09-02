<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDelivery extends Model
{
    protected $fillable = [
        'order_id',
        'delivery_status',
        'delivery_date',
        'delivery_by_id',
        'delivery_by_name',
        'delivery_by_email',
        'delivery_by_phone_no',
        'delivery_message',
    ];
}
