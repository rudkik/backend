<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'string|email:rfc,dns|required_without:phone_number',
            'phone_number' => 'required_without:email',
            'password' => 'required',
            'user_type' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required_without' => 'Обязательно для заполнение',
            'phone_number.required_without' => 'Обязательно для заполнение',
            'password.required' => 'Обязательно для заполнение',
            'user_type.required' => 'Обязательно для заполнение',
        ];
    }
}
