<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $fillable = [
        'order_id',
        'shipping_address_line1',
        'shipping_address_line2',
        'shipping_city',
        'shipping_zip_code',
        'shipping_country_id',

        'billing_address_line1',
        'billing_address_line2',
        'billing_city',
        'billing_zip_code',
        'billing_country_id'
    ];

    public function shippingCountry()
    {
        return $this->belongsTo(Country::class, 'shipping_country_id');
    }

    public function billingCountry()
    {
        return $this->belongsTo(Country::class, 'billing_country_id');
    }
}
