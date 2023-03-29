<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStepThreeCompany extends FormRequest
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
            'via' => 'string',
            'email' => 'email:rfc,dns|string|required_without:phone_number|unique:users',
            'phone_number' => 'regex:/^\+?[1-9][0-9]{7,14}$/|string|required_without:email|unique:users',
            'handbook_country_id'  => 'integer',
            'handbook_region_id'  => 'string',
            'own_elevator' => 'boolean',
            'user_type' => 'required|integer' ,
            'handbook_city_id' => 'integer',
            'about_company' => 'string|nullable',
            'company' => 'required|string',
            'telegram_link' => 'required_without:whatsapp_link|string',
            'whatsapp_link' => 'required_without:telegram_link|string',
            'company_link' => 'string|nullable',
            'bin' => 'required|max:12'
        ];
    }

}
