<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'name',
        'code',
        'start_date',
        'end_date',
        'is_active',
        'enable_consume_limit',
        'consume_limit_value',
        'total_consumed',
        'discount_type_id',
        'criteria_min_qty',
        'criteria_min_amount',
        'discount_value_type',
        'discount_amount'
    ];
    public function discount_type()
    {
        return $this->belongsTo(DiscountType::class);
    }
}
