<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Topic;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    public function __construct()
    {
       $this->middleware('teacher')->except('teaching');
    }

    public function index(Subject $subject)
    {
        $subjects = Subject::orderBy('id', 'desc')->where('user_id', Auth::id())->paginate(10);

        return view('teacher.pages.subject.index', compact('subjects'));
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

        $subject->title     = $request->input('title');
        $subject->subtitle      = $request->input('subtitle');
        $subject->description = $request->input('description');
        $subject->category = $request->input('category');
        $subject->user_id = Auth::user()->id;

        $subject->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $subject->addMediaFromRequest('cover_image')
                            ->preservingOriginal()
                            ->toMediaCollection('default');
        }

        return redirect()->route('audiences', $subject);
    }

    public function edit(Subject $subject)
    {
        $this->authorize('update', $subject);

        return view('pages.subject.edit', compact('subject'));
    }


    public function update(Request $request, Subject $subject)
    {
        $this->authorize('update', $subject);

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

    public function onBoard()
    {
        return view('teacher.pages.index');
    }

    public function starter()
    {
        return view('teacher.pages.start.index');
    }

    public function captureRole(Request $request)
    {
        $user = Auth::user();
        $user->role = $request->role;
        $user->save();

        return redirect()->route('manage.subjects');
    }

    public function destroy(Subject $subject)
    {
        $this->authorize('delete', $subject);

        try {
            $subject->delete();

            return redirect()->route('teacher.subjects')->with('success', 'Subject deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('teacher.subjects')->with('error', 'Failed to deleted subject');
        }
    }
}
