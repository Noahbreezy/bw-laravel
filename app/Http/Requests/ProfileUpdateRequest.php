<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => [
                'sometimes',
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'username' => ['required', 'string', 'max:15'],
            'phone_number' => ['nullable', 'regex:/^(\+32|0)[1-9][0-9]{7,8}$/'],
            'address' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable', 'date_format:d/m/Y'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'bio' => ['nullable', 'string', 'max:100'],
        ];
    }
}
