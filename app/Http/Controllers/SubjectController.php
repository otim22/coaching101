<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    public function index(Subject $subject)
    {
        $subjects = Subject::orderBy('id', 'desc')->paginate(10);

        return view('pages.subject.index', compact('subjects'));
    }

    public function create()
    {
        return view('pages.subject.create');
    }

    public function show(Subject $subject)
    {
        return view('pages.subject.show', compact('subject'));
    }

    public function store(SubjectRequest $request, Subject $subject)
    {
        $subject = new Subject($request->except(['cover_image']));

        $subject->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $subject->addMediaFromRequest('cover_image')
                            ->preservingOriginal()
                            ->toMediaCollection('default');
        }

        return redirect()->route('audiences', $subject);
    }
}
