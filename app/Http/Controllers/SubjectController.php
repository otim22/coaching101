<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all()->sortByDesc('updated_at');

        return view('app.subject.index', compact('subjects'));
    }

    public function create()
    {
        return view('app.subject.create');
    }

    public function show(Subject $subject)
    {
        return view('app.subject.show', compact('subject'));
    }

    public function store(SubjectRequest $request, Subject $subject)
    {
        $subject = new Subject($request->except(['cover_image']));

        $subject->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $subject->addMediaFromRequest('cover_image')->toMediaCollection('default');
        }

        return redirect()->route('audiences', $subject);
    }
}
