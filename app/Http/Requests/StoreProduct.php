<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'brand_id' => [],
            'category_id' => ['required', 'integer'],
            'concentration_id' => ['required', 'integer'],
            'name' => ['required', 'max:255'],
            'description' => [],
            'hide' => ['sometimes', 'boolean'],
            'img' => ['sometimes', 'file', 'image'],
            'site_description' => ['max:255'],
            'site_keyword' => ['max:255'],
        ];
    }
}
