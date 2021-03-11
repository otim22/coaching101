<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'book' => 'required|mimes:pdf|max:5520',
            'cover_image' => 'required|image|mimes:jpg, jpeg, png|max:5520',
            'user_id' => 'integer|nullable'
        ];

        $book_objective = count($this->input('book_objective'));

        foreach(range(0, $book_objective) as $index) {
            $rules[]['book_objective.' . $index] = 'required|string';
        }

        return $rules;
    }
}
