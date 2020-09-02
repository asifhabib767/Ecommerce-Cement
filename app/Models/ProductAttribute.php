<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'attribute_id',
        'attribute_values',
    ];


    protected $casts = [
        'attribute_values' => 'array'
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function values($attribute_values = null)
    {
        if (is_null($attribute_values)) {
            $values = json_decode($this->attribute_values);
        } else {
            $values = json_decode($attribute_values);
        }

        $attributeValueArray = [];
        foreach ($values as $value) {
            $attributeValue = AttributeValue::find($value);
            $array[] = $attributeValue;
        }
        return $attributeValueArray;
    }

    public function setMetaAttribute($value)
    {
        $list = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['key'])) {
                $list[] = $array_item;
            }
        }

        $this->attributes['attribute_values'] = json_encode($list);
    }
}
