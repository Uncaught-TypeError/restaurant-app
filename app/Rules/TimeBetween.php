<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeBetween implements ValidationRule
{
    /**
     * Indicates whether the rule should be implicit.
     *
     * @var bool
     */
    public $implicit = true;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        // when the restaurant is open
        $earliestTime = $pickupDate->copy()->setTime(8, 0, 0);
        $lastTime = $pickupDate->copy()->setTime(23, 0, 0);

        if ($pickupTime->between($earliestTime, $lastTime)) {
            $fail('Please choose the time between 8:00 AM and 11:00 PM.');
        }
    }

}
