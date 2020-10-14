<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
        $rules = [
            'title_vi' => 'required',
            'title_en' => 'required',
            'slug' => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'title_vi.required' => 'Tiêu đề (Tiếng Việt) không được trống',
            'title_en.required' => 'Tiêu đề (Tiếng Anh) không được trống',
            'slug.required'  => 'Slug không được trống'
        ];
        return $messages;
    }
}
