<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate(['body' => 'required|string|min:4|max:200']);

        $question =  new Question;
        $question->body = $request->input('body');
        $question->subject_id = $request->input('subject_id');

        $question->save();

        return redirect()->back();
    }
}
