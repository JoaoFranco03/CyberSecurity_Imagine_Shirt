<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
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
            'unit_price_catalog' => 'required|numeric',
            'unit_price_catalog_discount' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    $unitPriceCatalog = $this->input('unit_price_catalog');

                    if ($value > $unitPriceCatalog) {
                        $fail('The '.$attribute.' must not be greater than the unit price catalog.');
                    }
                },
            ],
            'unit_price_own' => 'required|numeric',
            'unit_price_own_discount' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    $unitPriceOwn = $this->input('unit_price_own');

                    if ($value > $unitPriceOwn) {
                        $fail('The '.$attribute.' must not be greater than the unit price own.');
                    }
                },
            ],
            'qty_discount' => 'required|int|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'unit_price_own_discount.required' => 'The unit_price_own_discount is required',
            'unit_price_own_discount.numeric' => 'The unit_price_own_discount must be a number',
            'unit_price_catalog.required' => 'The unit_price_catalog is required',
            'unit_price_catalog.numeric' => 'The unit_price_catalog must be a number',
            'unit_price_catalog_discount.required' => 'The unit_price_catalog_discount is required',
            'unit_price_catalog_discount.numeric' => 'The unit_price_catalog_discount must be a number',
            'unit_price_own.required' => 'The unit_price_own is required',
            'unit_price_own.numeric' => 'The unit_price_own must be a number',
            'qty_discount.required' => 'The qty_discount is required',
            'qty_discount.int' => 'The qty_discount must be a number',
            'qty_discount.min' => 'The qty_discount must be at least 1 or more',
        ];
    }
}
