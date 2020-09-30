<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Http\Requests\TopicRequest;

class TopicController extends Controller
{
    public function store(Request $request, Subject $subject)
    {
        $subject->content_title = $request->content_title;
        $subject->content_description = $request->content_description;

        if ($request->file('content_file_path')) {
            $fileName = time() . '_' . $request->content_file_path->getClientOriginalName();
            $filePath = $request->file('content_file_path')->storeAs('uploads', $fileName, 'public');

            $subject->content_file_path = '/storage/' . $filePath;
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

        $subject->resource_attachment_path = $resources_files_all;

        $subject->subject()->create();

        return redirect()->back();
    }
}
