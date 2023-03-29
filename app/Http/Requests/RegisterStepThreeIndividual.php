<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStepThreeIndividual extends FormRequest
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
            'first_name'  => 'required|string',
            'last_name'  => 'string|nullable',
            'handbook_country_id'  => 'integer|nullable',
            'handbook_region_id'  => 'integer|nullable',
            'own_elevator' => 'boolean',
            'user_type' => 'required|integer' ,
            'handbook_city_id' => 'integer|nullable'
        ];
    }

}
