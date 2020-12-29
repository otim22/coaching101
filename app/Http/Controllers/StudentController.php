<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Subject $subject)
    {
        $subjects = Subject::orderBy('id', 'desc')->where('user_id', $subject->user_id)->get()->take(3);
        $resourceCount = 0;

        foreach ($subject->topics as $topic) {
            if($topic->getMedia('resource_attachment')) {
                $resourceCount += count($topic->getMedia('resource_attachment'));
            }
        }

        return view('pages.subject_display.index', compact(['subjects', 'subject', 'resourceCount']));
    }

    public function show(Subject $subject, Topic $topic)
    {
        $previous = Topic::where('id', '<', $topic->id)->orderBy('id', 'desc')->first();
        $next = Topic::where('id', '>', $topic->id)->orderBy('id')->first();

        return view('pages.subject_display.show', compact(['subject', 'topic', 'previous', 'next']));
    }
}
