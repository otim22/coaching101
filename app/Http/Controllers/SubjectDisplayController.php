<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\ItemContent;

class SubjectDisplayController extends Controller
{
    public function index(ItemContent $subject)
    {
        $subjects = ItemContent::orderBy('id', 'desc')->where(['user_id' => $subject->user_id, 'is_approved' => 1])->get()->take(4 );
        $resourceCount = 0;

        foreach ($subject->topics as $topic) {
            if($topic->getMedia('resource_attachment')) {
                $resourceCount += count($topic->getMedia('resource_attachment'));
            }
        }

        return view('student.subject_display.index', compact(['subjects', 'subject', 'resourceCount']));
    }

    public function show(ItemContent $subject = null, Topic $topic = null)
    {
        $previous = Topic::where('id', '<', $topic->id)->orderBy('id', 'desc')->first();
        $next = Topic::where('id', '>', $topic->id)->orderBy('id')->first();
        $questions = Question::where('item_content_id', $subject->id)->paginate(18);

        return view('student.subject_display.show', compact(['subject', 'topic', 'previous', 'next', 'questions']));
    }
}
