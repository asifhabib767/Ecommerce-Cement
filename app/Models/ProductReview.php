<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    public $fillable = [
        'product_id',
        'user_id',
        'review',
        'message'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
