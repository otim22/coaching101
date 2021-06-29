<?php

namespace App\Http\Requests;

use App\Rules\MaxTitleValidator;
use App\Rules\MaxButtonTextValidator;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title' =>  ['required', 'string', new MaxTitleValidator],
            'description' => 'required',' string',
            'slider_image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'button_text' => ['string', new MaxButtonTextValidator],
            'button_link' => 'string|max:20'
        ];
    }
}
