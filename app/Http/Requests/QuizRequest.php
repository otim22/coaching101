<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
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
            'title' => 'required|string',
            'item_id' => 'required|integer',
            'item_content_id' => 'required|integer',
            'user_id' => 'integer|nullable'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'item_id' => 'Choose a category',
            'item_content_id' => 'Choose a course where the quiz belongs',
            'user_id.nullable' => 'Should be logged in'
        ];
    }
}
