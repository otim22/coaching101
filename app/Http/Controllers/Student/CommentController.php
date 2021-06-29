<?php

namespace App\Http\Controllers\Student;

use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate(['body' => 'required|string|min:3']);

        $comment = new Comment;
       $comment->body = $request->input('body');
       $comment->user()->associate($request->user());

       $question = Question::find($request->input('question_id'));
       $question->comments()->save($comment);

        return redirect()->back();
    }

    public function reply(Request $request)
    {
        $request->validate(['body' => 'required|string|min:3']);

        $reply = new Comment();
        $reply->body = $request->input('body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->input('comment_id');

        $question = Question::find($request->input('question_id'));
        $question->comments()->save($reply);

        return redirect()->back();
    }
}
