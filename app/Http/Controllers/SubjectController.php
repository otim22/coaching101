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

    public function edit(Subject $subject)
    {
        return view('pages.subject.edit', compact('subject'));
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

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'cover_image' => 'image|mimes:jpg,jpeg,png|max:5520'
        ]);

        $subject->fill($request->except(['cover_image']))->save();

        $subject->media()->delete($subject);

        if($subject->hasMedia('cover_image')) {
            $subject->updateMedia($request->hasFile('cover_image'), 'default'); 
        } else {
            $subject->addMediaFromRequest('cover_image')
                        ->toMediaCollection('default');
        }

        return redirect()->route('subjects.show', $subject)->with('success', 'Subject updated successfully');
    }

    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();

            return redirect()->route('teacher.subjects')->with('success', 'Subject deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('teacher.subjects')->with('error', 'Failed to deleted subject');
        }
    }
}
