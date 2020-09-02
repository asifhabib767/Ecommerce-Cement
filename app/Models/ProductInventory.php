<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductInventory extends Model
{
    public $fillable = [
        'product_id',
        'quantity',
        'current_stock',
        'price',
        'offer_enable',
        'offer_price',
        'offer_start_date',
        'offer_end_date',
        'is_active',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
