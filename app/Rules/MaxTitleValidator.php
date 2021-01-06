<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaxTitleValidator implements Rule
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

        return $wordCount >= 2 && $wordCount <= 5;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be between 3 and 8 words.';
    }
}
