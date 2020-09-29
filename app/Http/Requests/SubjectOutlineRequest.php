<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectOutlineRequest extends FormRequest
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
            'content_title' => 'required|string',
            'content_file_path' => 'required|mimes:mp4,mp3,mov,ogg,qt,webm|max:20000',
            'content_description' => 'required|string',
            'resource_attachment_path.*' => 'nullable|mimes:doc,pdf,docx,zip|max:8000'
        ];
    }
}
