<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'banner_image', 'image', 'description', 'meta_description', 'category_id', 'status', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'
    ];

    /**
     * category
     *
     * @return object returns the category model as obejct
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
