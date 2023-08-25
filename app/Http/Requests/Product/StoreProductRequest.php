<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'brand_id' => [], // 'required'
            'category_id' => [],
            'concentration_id' => [],
            'slug' => [],
            'name' => ['required', 'max:40'],
            'description' => [],
            'img' => [],
            'site_description' => [],
            'site_keyword' => [],
            'hide' => [], // 'required'
        ];
    }
}
