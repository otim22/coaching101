<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Topic;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Subject $subject)
    {
        $subjects = Subject::orderBy('id', 'desc')->where('user_id', Auth::id())->get()->take(3);
        $resourceCount = 0;

        foreach ($subject->topics as $topic) {
            if($topic->getMedia('resource_attachment')) {
                $resourceCount += count($topic->getMedia('resource_attachment'));
            }
        }

        return view('pages.student.index', compact(['subjects', 'subject', 'resourceCount']));
    }

    public function show(Subject $subject, Topic $topic)
    {
        $previous = Topic::where('id', '<', $topic->id)->orderBy('id', 'desc')->first();
        $next = Topic::where('id', '>', $topic->id)->orderBy('id')->first();

        return view('pages.student.show', compact(['subject', 'topic', 'previous', 'next']));
    }
}
