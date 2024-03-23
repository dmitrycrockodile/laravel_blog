<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',

            'content.required' => 'Content is required',
            'content.string' => 'Content must be a string',

            'preview_image.required' => 'Preview image is required',
            'preview_image.file' => 'Expected a file',
            'main_image.required' => 'Main image is required',
            'main_image.file' => 'Expected a file',

            'category_id.required' => 'Please choose category',
            'category_id.integer' => 'Category ID must be an integer',
            'category_id.exists' => 'Category must be from database',

            'tag_ids.array' => 'Must be an array',
        ];
    }
}
