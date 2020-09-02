<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

class DocummentCreateRequests extends FormRequest
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
            'file'  => 'required',
            'type'  => 'required',
            'link_type'  => 'required',
            'extension'  => 'required'
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
            'file.required'  => 'Please upload a file.',
            'type.required'  => 'Please select a type.',
            'link_type.required'  => 'Please select link type.',
            'extension.required'  => 'Please give an extension of your file.',
        ];
    }
}
