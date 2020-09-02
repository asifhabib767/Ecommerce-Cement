<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|max:100',
            'slug'  => 'nullable|max:100|unique:categories,slug',
            'logo_image'  => 'nullable|image',
            'banner_image'  => 'nullable|image'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Please give a category name.',
            'name.max'  => 'Please give category maximum of 100 characters.',
            'slug.max'  => 'Please give slug text maximum of 100 characters.',
            'slug.unique'  => 'Sorry, Slug (' . $this->slug . ') is already exist ! Please give an unique slug for categories.',
            'logo_image.image'  => 'Please give a valid logo image file; eg-jpg, png, gif, webp etc.',
            'banner_image.image'  => 'Please give a valid banner image file; eg-jpg, png, gif, webp etc.',
        ];
    }
}
