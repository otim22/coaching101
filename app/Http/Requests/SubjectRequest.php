<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'subtitle' => 'nullable|string',
            'description' => 'required|string',
            'standard_id' => 'required|integer',
            'level_id' => 'required|integer',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'cover_image' => 'required|image|mimes:jpg, jpeg, png|max:5520'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'description.required' => 'A description is required',
            'standard_id.required' => 'Choose a standard',
            'level.required' => 'Choose a level',
            'category_id.required' => 'Choose a subject',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'price.required' => 'Price is required in digits without (, .) characters',
            'cover_image.required' => 'A cover image is required'
        ];
    }
}
