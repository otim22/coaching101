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
        $rules = [
            'content_title' => 'required|string',
            'content_file_path' => 'required|mimes:mp4,mp3,mov,ogg,qt,webm|max:20000',
            'content_description' => 'required|string',
        ];
        
        $resources_attachments = count($this->input->files('resource_attachment_path'));
        foreach(range(0, $resources_attachments) as $index) {
            $rules['resource_attachment_path.' . $index] = 'nullable|mimes:doc,pdf,docx,zip|max:8000';
        }

        return $rules;
    }
}
