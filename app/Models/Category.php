<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'banner_image', 'logo_image', 'description', 'meta_description', 'parent_category_id', 'status', 'enable_bg', 'bg_color', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'
    ];

    public static function printCategory($category_id = null)
    {
        $html = "";
        $parentCategories = Category::select('id', 'name')->where('parent_category_id', null)->get();
        foreach ($parentCategories as $parent) {
            $html .= "<option value='" . $parent->id . "' disabled>" . $parent->name . "</option>";

            // Get Sub Categories
            $childCategories = Category::select('id', 'name')->where('parent_category_id', $parent->id)->get();
            foreach ($childCategories as $child) {
                if ($category_id === $child->id) {
                    $selected = " selected";
                } else {
                    $selected = "";
                }
                $html .= "<option value='" . $child->id . "' " . $selected . ">&nbsp;&nbsp;&nbsp;&nbsp;-- " . $child->name . "</option>";
            }
        }
        return $html;
    }
}
