<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamQuestionRequest extends FormRequest
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
            'exam_question' => 'required|string',
            'answer_explanation' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'exam_question.required' => 'Exam question is required',
            'answer_explanation.required' => 'Answer explanation is required',
        ];
    }
}
