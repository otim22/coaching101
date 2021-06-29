<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NameValidator implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $names = explode(' ', $value);
        $nameCount = count($names);

        return $nameCount >= 2 && $nameCount <= 3;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be full.';
    }
}
