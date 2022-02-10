<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaxButtonTextValidator implements Rule
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
        $words = explode(' ', $value);
        $wordCount = count($words);
        return ($wordCount >= 1 && $wordCount <= 10);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a maximum 3 words.';
    }
}
