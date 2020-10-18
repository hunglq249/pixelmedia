<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class ArticleCategoryRequest extends FormRequest
{
    private $action;

    function __construct(Route $route) {
        $this->action = $route;
    }
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
            'image' => 'required',
        ];
        $action = $this->action->getActionMethod();
        if($action == 'update'){
            unset($rules['image']);
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'title_vi.required' => 'Tiêu đề (Tiếng Việt) không được trống',
            'title_en.required' => 'Tiêu đề (Tiếng Anh) không được trống',
            'slug.required'  => 'Slug không được trống',
            'image.required' => 'Hình Ảnh không được trống'
        ];
        $action = $this->action->getActionMethod();
        if($action == 'update'){
            unset($messages['image.required']);
        }
        return $messages;
    }
}
