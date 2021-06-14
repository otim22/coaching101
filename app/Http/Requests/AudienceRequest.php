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

        $studentLearnCount = count($this->input('student_learn'));
        $classRequirementCount = count($this->input('class_requirement'));
        $targetStudentCount = count($this->input('target_student'));

        foreach(range(1, $studentLearnCount) as $index) {
            $rules[]['student_learn.' . $index] = 'required|string';
        }

        foreach(range(1, $classRequirementCount) as $index) {
            $rules[]['class_requirement.' . $index] = 'required|string';
        }

        foreach(range(1, $targetStudentCount) as $index) {
            $rules[]['target_student.' . $index] = 'required|string';
        }

        return $rules;
    }
}
