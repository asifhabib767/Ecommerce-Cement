<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;

class TagCreateRequests extends FormRequest
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
            'title'  => 'required|max:100',
            'slug'  => 'nullable|max:100|unique:tags,slug',
            'image'  => 'nullable|image',
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
        return  [
            'title.required' => 'Please give a tag title.',
            'title.max'  => 'Please give tag maximum of 100 characters.',
            'slug.max'  => 'Please give slug text maximum of 100 characters.',
            'slug.unique'  => 'Sorry, Slug (' . $this->slug . ') is already exist ! Please give an unique slug for tags.',
            'image.image'  => 'Please give a valid image file; eg-jpg, png, gif, webp etc.',
            'banner_image.image'  => 'Please give a valid banner image file; eg-jpg, png, gif, webp etc.',
        ];
    }
}
