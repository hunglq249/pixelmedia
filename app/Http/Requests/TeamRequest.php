<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class TeamRequest extends FormRequest
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
            'image' => 'required',
            'name' => 'required',
            'position' => 'required',
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
            'image.required' => 'Hình Ảnh không được trống',
            'name.required' => 'HỌ & Tên không được trống',
            'position.required'  => 'Vị Trí không được trống'
        ];

        $action = $this->action->getActionMethod();
        if($action == 'update'){
            unset($messages['image.required']);
        }
        return $messages;
    }
}
