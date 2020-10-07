<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Subject;
use App\Http\Requests\TopicRequest;

class TopicController extends Controller
{
    public function index()
    {
        return view('pages.subject.topics.index');
    }

    public function create(Subject $subject)
    {
        return view('pages.subject.topics.create', compact('subject'));
    }

    public function show(Subject $subject, Topic $topic)
    {
        return view('pages.subject.topics.show', compact(['subject', 'topic']));
    }

    public function store(TopicRequest $request, Subject $subject)
    {
        $topic = new Topic;

        $topic->content_title = $request->content_title;
        $topic->content_description = $request->content_description;

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

    public function edit(Subject $subject)
    {
        return view('pages.subject.topics.edit', compact('subject'));
    }
}
