<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'voivodeship_id' => ['required'],
            'name' => ['required', 'max:30'],
            'surname' => ['required', 'max:30'],
            'street' => ['required', 'min:3', 'max:60'],
            'zip_code' => ['required', 'regex:/^([0-9]{2})(-[0-9]{3})?$/i'],
            'city' => ['required', 'max:30'],
            'email' => ['required', 'min:5', 'max:60'],
            'phone' => ['nullable', 'digits:9'],
        ];
    }
}
