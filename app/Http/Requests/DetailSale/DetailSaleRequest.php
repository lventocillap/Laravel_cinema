<?php

namespace App\Http\Requests\DetailSale;

use App\Rules\SeatAvaleableRule;
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
            'billboard_id'=>['required', 'exists:billboards,id'],
            'seat_id'=>['required', 'array'],
            'seat_id.*' => ['required', 'exists:seats,id', new SeatAvaleableRule()],
            'price_id'=>['required','array'],
            'price_id.*' => ['required', 'exists:prices,id']
        ];
    }
}
