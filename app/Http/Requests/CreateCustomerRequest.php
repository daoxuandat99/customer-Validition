<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'name' => 'required|min:3',
            'age' => 'required|before:today',
            'email' => 'required|unique:customers,email|email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên phải có ít nhất 3 kí tự',
            'age.required' => 'Tuổi không được để trống',
            'age.before:today' => 'Sai định dạng',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã được sử dụng',
            'email.email' => 'Email sai định dạng',
        ];
    }
}
