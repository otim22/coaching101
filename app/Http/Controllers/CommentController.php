<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function store(Request $request)
    {
        // dd($request);
        $comment = new Comment;
       $comment->body = $request->get('body');
       $comment->user()->associate($request->user());
       $question = Question::find($request->get('question_id'));
       $question->comments()->save($comment);

        return redirect()->back();
    }

    public function reply(Request $request)
    {
        dd($request);
        $reply = new Comment();
        $reply->body = $request->get('body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Question::find($request->get('question_id'));

        $post->comments()->save($reply);

        return redirect()->back();

    }
}
