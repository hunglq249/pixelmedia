<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class ProductRequest extends FormRequest
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
            'product_category_id' => 'required',
            'client' => 'required',
            'date' => 'required',
            'cover_type' => 'required',
            'team_id' => 'required',
            'title_vi' => 'required',
            'title_en' => 'required',
            'sub_title_vi' => 'required',
            'sub_title_en' => 'required',
            'slug' => 'required',
            'cover_mask' => 'required',
            'images' => 'required',
        ];
        $action = $this->action->getActionMethod();
        if($action == 'update'){
            unset($rules['images']);
            unset($rules['cover_mask']);
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'product_category_id.required' => 'Danh Mục không được trống',
            'client.required' => 'Khách Hàng không được trống',
            'date.required'  => 'Ngày Tháng không được trống',
            'cover_type.required'  => 'Thể Loại không được trống',
            'team_id.required'  => 'Thành Viên không được trống',
            'title_vi.required'  => 'Tiêu Đề (Tiếng Việt) không được trống',
            'title_en.required'  => 'Tiêu Đề (Tiếng Anh) không được trống',
            'sub_title_vi.required'  => 'Tiêu Đề Phụ (Tiếng Việt) không được trống',
            'sub_title_en.required'  => 'Tiêu Đề Phụ (Tiếng Anh) không được trống',
            'slug.required'  => 'Slug không được trống',
            'cover_mask.required'  => 'Thumb không được trống',
            'images.required'  => 'Danh Sách Ảnh không được trống',
        ];

        $action = $this->action->getActionMethod();
        if($action == 'update'){
            unset($messages['images']);
            unset($messages['cover_mask']);
        }
        return $messages;
    }
}
