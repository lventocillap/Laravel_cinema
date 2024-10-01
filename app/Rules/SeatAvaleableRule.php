<?php

namespace App\Rules;

use App\Enums\SeatStatusesEnum;
use App\Models\Seat;
use App\Models\SeatStatuses;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SeatAvaleableRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!Seat::where('id',$value)->where('status_id',SeatStatuses::where('name', SeatStatusesEnum::AVALAIBLE->value)->first()->id)->exists()){
            $fail('Asiento : '.$value.' no disponible');
        }
    }
}
