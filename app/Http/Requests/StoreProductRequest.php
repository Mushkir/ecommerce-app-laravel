<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'product_name' => 'required|string|min:3|max:50',
            'description' => 'required|string',
            'image' => 'required',
            'price' => 'required|string',
            'category' => 'required',
            'quantity' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'This field can not be empty.',
            'product_name.string' => 'Product name must be text value.',
            'product_name.min' => 'Product name must be at least 03 characters long.',
            'product_name.max' => 'Product name must must not exceed 255 characters.',
            'description.required' => 'This field can not be empty.',
            'description.string' => 'description must be text value.',
            'image,required' => 'This field can not be empty.',
            'price.required' => 'This field can not be empty.',
            'price.string' => 'Price must be text value.',
            'category.required' => 'This field can not be empty.',
            'quantity.required' => 'This field can not be empty.',
            'quantity.string' => 'Quantity must be text value.',
        ];
    }
}
