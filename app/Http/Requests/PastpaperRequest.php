<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PastpaperRequest extends FormRequest
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
            'standard_id' => 'required|integer',
            'level_id' => 'required|integer',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'user_id' => 'integer|nullable'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'price.nullable' => 'Price is required in digits without (, .) characters',
            'standard_id.required' => 'Choose a standard',
            'level.required' => 'Choose a level',
            'category_id.required' => 'Choose a subject',
            'year_id.required' => 'Choose a year',
            'term_id.required' => 'Choose a term',
            'user_id.nullable' => 'Should be logged in'
        ];
    }
}
