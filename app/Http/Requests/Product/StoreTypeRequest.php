<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTypeRequest extends FormRequest
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
            'product_id' => ['required'],
            'size_id' => ['required'],
            'slug' => [], // [Rule::unique('types')->ignore($this->type),],
            'name' => ['required', 'max:40'],
            'price' => ['required', 'numeric', 'min:1', 'max:9999.99'],
            'promo_price' => ['sometimes', 'min:0', 'max:9999.99'], // 'numeric',
            'quantity' => ['required', 'numeric', 'min:0', 'max:255'],
            'hide' => ['sometimes', 'boolean'],
            'description' => [],
            'img' => ['sometimes', 'file', 'image'],
        ];
    }
}
