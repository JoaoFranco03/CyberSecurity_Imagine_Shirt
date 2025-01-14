<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email:rfc|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'user_photo' => 'nullable|file|mimes:jpeg,png,jpg,gif',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' =>  'The email is required',
            'email.email' =>  'The email must be a valid email address',
            'email.unique' =>  'The email must be unique',
            'name.required' =>  'The name is required',
            'password.required' =>  'The password is required',
            'password.min' =>  'The password must be at least 8 characters',
            'password_confirmation.required' =>  'The password confirmation is required',
            'password_confirmation.same' =>  'The password confirmation must be the same as password',
            'user_photo.image' =>  'The user photo must be an image',
        ];
    }
}
