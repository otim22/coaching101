<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectOutline;

class SubjectOutlineController extends Controller
{
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $subject_outline = new SubjectOutline;

        $subject_outline->content_title = $request->content_title;
        $subject_outline->content_description = $request->content_description;

        if ($request->file('content_file_path')) {
            $fileName = time() . '_' . $request->content_file_path->getClientOriginalName();
            $filePath = $request->file('content_file_path')->storeAs('uploads', $fileName, 'public');

            $subject_outline->content_file_path = '/storage/' . $filePath;
        }

        if ($request->file('resource_attachment_path')) {
            $fileName = time() . '_' . $request->resource_attachment_path->getClientOriginalName();
            $filePath = $request->file('resource_attachment_path')->storeAs('uploads', $fileName, 'public');

            $subject_outline->resource_attachment_path = '/storage/' . $filePath;
        }

        dd($subject_outline);

        $subject_outline->save();

        return redirect()->back();
    }

    protected function validateRequest($request)
    {
        return $request->validate([
            'content_title' => 'required|string',
            'content_file_path' => 'required|mimes:mp4,mp3,pdf,mov,ogg,qt,webm|max:20000',
            'content_description' => 'required|string',
            'resource_attachment_path' => 'nullable|mimes:doc,pdf,docx,zip,mp4,mp3|max:8000'
        ]);
    }
}
