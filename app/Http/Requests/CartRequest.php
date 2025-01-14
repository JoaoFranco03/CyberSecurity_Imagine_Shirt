<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'color' => 'required | exists:colors,code',
            'size' => 'required | in:XS,S,M,L,XL',
            'qty' => 'required | integer| min:1'
        ];
    }

    public function messages(): array
    {
        return [
            'color.required' =>  'The color is required',
            'color.exists' =>  'The color must exist in the database',
            'size.required' =>  'The size is required',
            'size.in' =>  'The size must be XS, S, M, L or XL',
            'qty.required' =>  'The quantity is required',
            'qty.min' =>  'The quantity must be at least 1',
            'qty.integer' =>  'The quantity must be an integer',
            ];
    }
}
