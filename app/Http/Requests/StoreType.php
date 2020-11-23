<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreType extends FormRequest
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
            'product_id' => ['required', 'integer'],
            // 'slug' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:1', 'max:9999.99'],
            'promo_price' => ['sometimes', 'numeric', 'min:0.00', 'max:9999.99'],
            'quantity' => ['required', 'numeric', 'min:0', 'max:255'],
            'hide' => ['sometimes', 'boolean'],
            'description' => [],
            'img' => ['sometimes', 'file', 'image'],
        ];
    }
}
