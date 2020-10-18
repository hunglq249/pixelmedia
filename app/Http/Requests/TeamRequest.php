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
            'image.required' => sprintf(config('constants.MESSAGE_CANT_BE_BLANK'), 'Hình Ảnh'),
            'name.required' => sprintf(config('constants.MESSAGE_CANT_BE_BLANK'), 'HỌ & Tên'),
            'position.required'  => sprintf(config('constants.MESSAGE_CANT_BE_BLANK'), 'Vị Trí'),
        ];

        $action = $this->action->getActionMethod();
        if($action == 'update'){
            unset($messages['image.required']);
        }
        return $messages;
    }
}
