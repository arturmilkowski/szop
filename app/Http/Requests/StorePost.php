<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StorePost extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        // dd($this);
        
        $collection = collect($this['tags']);
        $filtered = $collection->filter(
            function ($value, $key) {
                return $value != null;
            }
        );
        
        /*
        $this->merge([
            'tag' => Str::slug($this->slug),
        ]);
        */
        $this['tags'] = $filtered->all();
        // dd($this['tags']);
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'tag_id' => ['sometimes', 'integer'],
            'title' => ['required', 'max:40', Rule::unique('posts', 'title')->ignore($this->post)],  //"unique:App\Models\Blog\Post,title"
            'intro' => ['max:255'],
            'content' => ['max:20000'],
            'img' => ['sometimes', 'file', 'image'],
            'site_description' => ['max:255'],
            'site_keyword' => ['max:255'],
            'approved' => [],
            'published' => [],
            'comments_allowed' => [],
        ];
    }
}
