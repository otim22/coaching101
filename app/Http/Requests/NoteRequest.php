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
            'standard_id' => 'required|integer',
            'level_id' => 'required|integer',
            'category_id' => 'required|integer',
            'item_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'note' => 'required|mimes:pdf',
            'user_id' => 'integer|nullable',
        ];

        $notes_objective = count($this->input('objective'));

        foreach(range(1, $notes_objective) as $index) {
            $rules[]['objective.' . $index] = 'required|string';
        }

        return $rules;
    }
}
