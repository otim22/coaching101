<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        $answerCount = count($this->input('answer'));

        foreach(range(1, $answerCount) as $index) {
            $rules[]['answer.' . $index] = 'required|string';
        }

        return $rules;
    }
}
