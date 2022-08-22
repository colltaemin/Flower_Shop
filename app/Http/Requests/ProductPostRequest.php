<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|numeric',
            'contents' => 'required|string',
            'tags' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'price.required' => 'Giá không được để trống',
            'contents.required' => 'Nội dung không được để trống',
            'tags.required' => 'Tags không được để trống',
            'name.max' => 'Tên sản phẩm không được quá 255 ký tự',
            'category_id.integer' => 'Danh mục không hợp lệ',
            'category_id.exists' => 'Danh mục không tồn tại',
            'price.numeric' => 'Giá không hợp lệ, phải là số',
            'contents.string' => 'Nội dung không hợp lệ',
            'tags.array' => 'Tags không hợp lệ',
        ];
    }
}
