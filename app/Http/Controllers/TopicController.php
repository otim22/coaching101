<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Subject;
use App\Http\Requests\TopicRequest;

class TopicController extends Controller
{
    public function create(Subject $subject)
    {
        return view('pages.subject.topics.create', compact('subject'));
    }

    public function show(Subject $subject, Topic $topic)
    {
        return view('pages.subject.topics.show', compact(['subject', 'topic']));
    }

    public function edit(Subject $subject, Topic $topic)
    {
        return view('pages.subject.topics.edit', compact(['subject', 'topic']));
    }

    public function store(TopicRequest $request, Subject $subject)
    {
        $topic = new Topic;

        $topic->title = $request->title;
        $topic->description = $request->description;

        if($request->hasFile('content_file_path') && $request->file('content_file_path')->isValid()) {
            $topic->addMediaFromRequest('content_file_path')
                        ->preservingOriginal()
                        ->toMediaCollection('content_file');
        }

        if ($request->hasFile('resource_attachment_path')) {
            foreach ($request->file('resource_attachment_path') as $resource_file) {
                $topic->addMedia($resource_file)
                            ->preservingOriginal()
                            ->toMediaCollection('resource_attachment');
            }
        }

        $subject->topics()->save($topic);

        return redirect()->route('subjects.show', $subject);
    }

    public function update(Request $request, Subject $subject, Topic $topic)
    {
        $request->validate([
            'title' => 'required|string',
            'content_file_path' => 'nullable|mimes:mp4,mp3,mov,ogg|max:100000',
            'description' => 'required|string',
            'resource_attachment_path.*' => 'nullable|mimes:doc,pdf,docx,zip|max:8000'
        ]);

        $topic->title = $request->title;
        $topic->description = $request->description;

        if($request->hasFile('content_file_path') && $request->file('content_file_path')->isValid()) {
            $topic->addMediaFromRequest('content_file_path')
                        ->preservingOriginal()
                        ->toMediaCollection('content_file');
        }

        if ($request->hasFile('resource_attachment_path')) {
            foreach ($request->file('resource_attachment_path') as $resource_file) {
                $topic->addMedia($resource_file)
                            ->preservingOriginal()
                            ->toMediaCollection('resource_attachment');
            }
        }

        $subject->topics()->save($topic);

        return redirect()->route('subjects.show', $subject);
    }
}
