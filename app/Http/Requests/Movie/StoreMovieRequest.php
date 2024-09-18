<?php

namespace App\Http\Requests\Movie;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'string', 'max:20'],
            'time' => ['required', 'date_format:H:i'],
            'premiere' => ['required', 'date_format:Y-m-d'],
            'status_id' =>['required', 'exists:movie_statuses,id']
        ];
    }
}
