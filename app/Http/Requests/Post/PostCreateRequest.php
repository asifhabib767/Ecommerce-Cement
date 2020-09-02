<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'slug'  => 'nullable|max:100|unique:posts,slug',
            'featured_image'  => 'nullable|image'
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
            'name.required' => 'Please give a titile name.',
            'slug.max'  => 'Please give slug text maximum of 100 characters.',
            'slug.unique'  => 'Sorry, Slug (' . $this->slug . ') is already exist ! Please give an unique slug for Post.',
            'logo_image.image'  => 'Please give a valid logo image file; eg-jpg, png, gif, webp etc.',

        ];
    }
}
