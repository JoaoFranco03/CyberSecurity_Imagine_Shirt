<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'nif' => 'required|integer|digits:9',
            'address' => 'required|string|max:255',
            'payment_type' => 'required|in:VISA,MC,PAYPAL',
            'payment_ref' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    $paymentType = $this->input('payment_type');

                    if ($paymentType === 'VISA') {
                        if (!preg_match('/^4\d{12}(?:\d{3})?$/', $value)) {
                            $fail('The '.$attribute.' format is invalid for VISA.');
                        }
                    } elseif ($paymentType === 'MC') {
                        if (!preg_match('/^5[1-5]\d{14}$/', $value)) {
                            $fail('The '.$attribute.' format is invalid for MasterCard.');
                        }
                    } elseif ($paymentType === 'PAYPAL') {
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $fail('The '.$attribute.' format is invalid for PayPal. Must be an email address.');
                        }
                    }
                },
            ],
            'notes' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nif.required' => 'The NIF is required',
            'nif.integer' => 'The NIF must be an integer',
            'nif.digits' => 'The NIF must have 9 digits',
            'address.required' => 'The address is required',
            'address.string' => 'The address must be a string',
            'address.max' => 'The address can have a maximum of 255 characters',
            'payment_type.required' => 'The payment type is required',
            'payment_type.in' => 'The payment type must be VISA, MC or PAYPAL',
            'payment_ref.required' => 'The payment reference is required',
            'payment_ref.string' => 'The payment reference must be a string',
            'payment_ref.max' => 'The payment reference can have a maximum of 255 characters',
            'payment_ref.regex' => 'The payment reference format is invalid
            for the selected payment type',
        ];
    }

}
