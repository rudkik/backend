<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStepOne extends FormRequest
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
            'email' => 'email:rfc,dns|string|required_without:phone_number|unique:users',
            'phone_number' => 'regex:/^\+?[1-9][0-9]{7,14}$/|string|required_without:email|unique:users',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required_without' => 'Обязательно для заполнение',
            'phone_number.required_without' => 'Обязательно для заполнение',
        ];
    }
}
