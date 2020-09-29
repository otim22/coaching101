<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectOutline;
use App\Http\Requests\SubjectOutlineRequest;

class SubjectOutlineController extends Controller
{
    public function store(Request $request)
    {
        dd($request);
        $subject_outline = new SubjectOutline;

        $subject_outline->content_title = $request->content_title;
        $subject_outline->content_description = $request->content_description;

        if ($request->file('content_file_path')) {
            $fileName = time() . '_' . $request->content_file_path->getClientOriginalName();
            $filePath = $request->file('content_file_path')->storeAs('uploads', $fileName, 'public');

            $subject_outline->content_file_path = '/storage/' . $filePath;
        }

        $resources_files = $request->file('resource_attachment_path');
        $resources_files_all = [];

        if ($resources_files) {
            foreach ($resources_files as $resources_file) {
                $fileName = time() . '_' . $resources_file->getClientOriginalName();
                $filePath = $resources_file->storeAs('uploads', $fileName, 'public');

                $resources_files_all[] = '/storage/' . $filePath;
            }
        }

        $subject_outline->resource_attachment_path = $resources_files_all;

        $subject_outline->save();

        return redirect()->back();
    }
}
