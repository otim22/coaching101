<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamOptionRequest extends FormRequest
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
        return [
            'option' => 'required|string',
            'is_correct' => 'required|string',
            'exam_question_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'option.required' => 'Exam option is required',
            'is_correct.required' => 'Is this the correct answer?',
            'exam_question_id.required' => 'Choose a question where option belongs to',
        ];
    }
}
