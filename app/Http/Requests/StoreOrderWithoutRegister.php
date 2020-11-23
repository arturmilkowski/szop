<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderWithoutRegister extends FormRequest
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
            'name' => 'required|string|min:3|max:30',
            'lastname' => 'required|string||min:3|max:30',
            'street' => 'required|min:3|max:60',
            'zip_code' => 'required|regex:/^([0-9]{2})(-[0-9]{3})?$/i',  // /^[0-9]{2}-?[0-9]{3}$/Du  'required|max:6|min:6',
            'city' => 'required|min:3|max:60',
            'voivodeship_id' => 'required|string',
            'email' => 'required|min:5|max:30',
            'phone' => 'nullable|digits:9',
            'comment' => 'max:1000',
            'term' => 'required',
        ];
    }
}
