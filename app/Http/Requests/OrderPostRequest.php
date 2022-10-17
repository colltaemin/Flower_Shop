<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderPostRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string',

            'shipped_at' => 'required|date',
            'paid_at' => 'required|string',
            'name_buy' => 'required|string|max:255',
            'phone_buy' => 'required|numeric',
            'district' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'address.required' => 'Địa chỉ không được để trống',

            'name.max' => 'Tên không được quá 255 ký tự',
            'email.email' => 'Email không hợp lệ',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'address.string' => 'Địa chỉ không hợp lệ',

            'shipped_at.required' => 'Ngày giao hàng không được để trống',
            'shipped_at.date' => 'Ngày giao hàng không hợp lệ',
            'paid_at.required' => 'Hình thức thanh toán không được để trống',

            'name_buy.required' => 'Tên người mua không được để trống',
            'name_buy.max' => 'Tên người mua không được quá 255 ký tự',
            'name_buy.string' => 'Tên người mua không hợp lệ',
            'phone_buy.required' => 'Số điện thoại người mua không được để trống',
            'phone_buy.numeric' => 'Số điện thoại người mua không hợp lệ',
            'district.required' => 'Quận/Huyện không được để trống',
        ];
    }
}
