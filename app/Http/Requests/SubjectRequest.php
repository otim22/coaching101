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
            'category_id' => 'required|integer',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'cover_image' => 'required|image|mimes:jpg, jpeg, png|max:5520'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'description.required' => 'A description is required',
            'category_id.required' => 'Choose a subject',
            'price.required' => 'Price is required in digits without (, .) characters',
            'cover_image.required' => 'A cover image is required'
        ];
    }
}
