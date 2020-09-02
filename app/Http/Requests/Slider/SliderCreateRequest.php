<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderCreateRequest extends FormRequest
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
            'slug'  => 'nullable|max:100|unique:sliders,slug',
            'image'  => 'nullable|image',
            'is_button_enable'  => 'required',
            'button_text'  => 'nullable',
            'button_link'  => 'nullable',
            'is_blank_redirect'  => 'required',
            'is_description_enable'  => 'required',
            'short_description'  => 'nullable',
            'status'  => 'required'
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
            'title.required' => 'Please give a slider title.',
            'title.max'  => 'Please give slider maximum of 100 characters.',
            'slug.max'  => 'Please give slug text maximum of 100 characters.',
            'slug.unique'  => 'Sorry, Slug (' . $this->slug . ') is already exist ! Please give an unique slug for sliders.',
            'is_button_enable.required' => 'Please select the button is enabled or disabled.',
            'is_blank_redirect.required' => 'Please select it will redirect blank or not.',
            'is_description_enable.required' => 'Please select the description is enabled or disabled.',
            'status.required' => 'Please give a slider status.',
        ];
    }
}
