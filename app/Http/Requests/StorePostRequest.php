<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow only authenticated users to make this request
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add validation for cover image
        ];
    }

    /**
     * Customize the error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'A title is required for the post.',
            'title.max' => 'The title must not exceed 255 characters.',
            'content.required' => 'The content of the post is required.',
            'cover.image' => 'The cover must be an image.',
            'cover.mimes' => 'The cover must be a file of type: jpeg, png, jpg, gif, svg.',
            'cover.max' => 'The cover must not be greater than 2048 kilobytes.',
        ];
    }
}
