<?php

namespace App\Http\Controllers\Student;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate(['body' => 'required|string|min:4|max:200']);

        $question =  new Question;
        $question->body = $request->input('body');
        $question->item_content_id = $request->input('item_content_id');

        $question->save();

        return redirect()->back();
    }
}
