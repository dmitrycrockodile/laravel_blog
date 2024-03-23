<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
    public function rules(): array {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email' . $this->user->id,
            'role' => 'required|integer',
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Please enter your name',
            'name.string' => 'Name must be a string',

            'email.required' => 'Please enter your email',
            'email.string' => 'Email must be a string',
            'email.email' => 'Email must be valid',
            'email.unique' => 'It seems like this email already in use',

            'role.required' => 'Please choose a role',
            'role.string' => 'Role must be an integer',
        ];
    }
}
