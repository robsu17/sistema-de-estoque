<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable',
            'category_id' => 'required',
            'location_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'quantity.min' => 'O campo quantidade deve ser um número positivo.'
        ];
    }
}
