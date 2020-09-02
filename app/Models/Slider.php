<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'image', 'is_button_enable', 'button_text', 'button_link', 'is_blank_redirect', 'is_description_enable', 'short_description', 'status', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'
    ];
}
