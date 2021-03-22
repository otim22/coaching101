<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Subject;
use App\Models\Question;
use Illuminate\Http\Request;

class SubjectDisplayController extends Controller
{
    public function index(Subject $subject)
    {
        $subjects = Subject::orderBy('id', 'desc')->where(['user_id' => $subject->user_id, 'is_approved' => 1])->get()->take(4 );
        $resourceCount = 0;

        foreach ($subject->topics as $topic) {
            if($topic->getMedia('resource_attachment')) {
                $resourceCount += count($topic->getMedia('resource_attachment'));
            }
        }

        return view('student.subject_display.index', compact(['subjects', 'subject', 'resourceCount']));
    }

    public function show(Subject $subject = null, Topic $topic = null)
    {
        $previous = Topic::where('id', '<', $topic->id)->orderBy('id', 'desc')->first();
        $next = Topic::where('id', '>', $topic->id)->orderBy('id')->first();
        $questions = Question::where('subject_id', $subject->id)->paginate(18);

        return view('student.subject_display.show', compact(['subject', 'topic', 'previous', 'next', 'questions']));
    }
}
