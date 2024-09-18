<?php

namespace App\Http\Requests\DetailSale;

use Illuminate\Foundation\Http\FormRequest;

class DetailSaleRequest extends FormRequest
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
            'sale_id' => ['required', 'exists:sale_id,id'],
            'billboard_id'=>['required', 'exists:billboard_id,id'],
            'seat_id' => ['required', 'exists:seat_id,id'],
            'price' => ['required', 'numeric', 'min:0']
        ];
    }
}
