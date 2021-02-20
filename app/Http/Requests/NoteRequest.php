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
        return [
            'title' => 'required|string',
            'price' => 'nullable',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'note' => 'required|mimes:pdf|max:5000',
            'user_id' => 'integer|nullable',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'price.nullable' => 'Price is required in digits without (, .) characters',
            'category_id.required' => 'Choose a subject',
            'year_id.required' => 'Choose a year',
            'term_id.required' => 'Choose a term',
            'note.required' => 'Should be a pdf file',
            'user_id.nullable' => 'Should be logged in',
        ];
    }
}
