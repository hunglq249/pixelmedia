<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class VideoRequest extends FormRequest
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
            'path' => 'required|mimes:mp4,mov,ogg,qt',
        ];
        $action = $this->action->getActionMethod();
        if($action == 'update'){
            $rules['path'] = 'mimes:mp4,mov,ogg,qt,flv,m3u8,ts,3gp,avi,wmv';
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'title_vi.required'  => 'Tiêu Đề (Tiếng Việt) không được trống',
            'title_en.required'  => 'Tiêu Đề (Tiếng Anh) không được trống',
            'path.required'  => 'Video không được trống',
            'path.mimes' => 'Định dạng file không đúng'
        ];
        $action = $this->action->getActionMethod();
        if($action == 'update'){
            unset($messages['images.required']);
            $messages['path'] = 'mimes:mp4,mov,ogg,qt,flv,m3u8,ts,3gp,avi,wmv';
        }
        return $messages;
    }
}
