<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfile extends FormRequest
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
            'name' => 'sometimes|required|string|min:3',
            'email' => 'sometimes|required|email',
            'lastname' => 'required|string|min:3|max:30',
            'street' => 'required|min:3|max:60',
            'zip_code' => 'required|regex:/^([0-9]{2})(-[0-9]{3})?$/i',
            // /^[0-9]{2}-?[0-9]{3}$/Du  'required|max:6|min:6',
            'city' => 'required|min:3|max:60',
            'voivodeship_id' => 'required',
            'phone' => 'nullable|digits:9',
        ];
    }
}
