<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image_path',
        'image_path_sm',
        'image_name',
        'image_alt_text'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
