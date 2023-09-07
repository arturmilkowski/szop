<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->title),
            'approved' => $this->request->get('approved') ?? 0,
            'published' => $this->request->get('published') ?? 0,
            'comments_allowed' => $this->request->get('comments_allowed') ?? 0,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => [],
            'slug' => [],
            'title' => ['required', 'max:255', Rule::unique('posts', 'title')->ignore($this->post)],
            'intro' => ['max:255'],
            'content' => [],
            'img' => ['sometimes', 'file', 'image'],
            'site_description' => ['max:255'],
            'site_keyword' => ['max:255'],
            'approved' => [],
            'published' => [],
            'comments_allowed' => [],
        ];
    }
}
