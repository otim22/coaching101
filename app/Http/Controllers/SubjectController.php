<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all()->take(2);

        return view('app.subject.introduction.index', compact('subjects'));
    }

    public function show(Subject $subject)
    {
        return view('app.subjects.show', compact('subject'));
    }

    public function store(Request $request)
    {
        $subject = new Subject($request->except(['cover_image']));

        $subject->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $subject->addMediaFromRequest('cover_image')->toMediaCollection('default');
        }

        return redirect('/audiences');
    }
}
