<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AudienceRequest extends FormRequest
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

        $student_learn = count($this->input('student_learn'));
        $class_requirement = count($this->input('class_requirement'));
        $target_student = count($this->input('target_student'));

        foreach(range(0, $student_learn) as $index) {
            $rules[]['student_learn.' . $index] = 'required|string';
        }

        foreach(range(0, $class_requirement) as $index) {
            $rules[]['class_requirement.' . $index] = 'required|string';
        }

        foreach(range(0, $target_student) as $index) {
            $rules[]['target_student.' . $index] = 'required|string';
        }

        return $rules;
    }
}
