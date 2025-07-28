<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'barcode' => ['required', 'string', 'regex:/^\d{13}$/'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
