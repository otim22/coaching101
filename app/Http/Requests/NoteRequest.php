<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string',
            'price' => 'nullable',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'note' => 'required|mimes:pdf|max:5000',
            'user_id' => 'integer|nullable',
        ];

        $notes_objective = count($this->input('notes_objective'));

        foreach(range(0, $notes_objective) as $index) {
            $rules[]['notes_objective.' . $index] = 'required|string';
        }

        return $rules;
    }
}
