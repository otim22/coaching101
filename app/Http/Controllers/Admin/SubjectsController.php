<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Models\Year;
use App\Models\Term;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(50);

        return view('admin.videos.index', compact('subjects'));
    }

    public function show(Subject $subject)
    {
        return view('admin.videos.show', compact('subject'));
    }

    public function approve(Subject $subject)
    {
        $approveSubject = Subject::find($subject->id);

        if($approveSubject->content_approved == 0) {
            $approveSubject->content_approved = 1;
            $approveSubject->save();
        } else {
            return redirect()->route('admin.subjects.index')->with('info', 'Subject already approved');
        }

        return redirect()->route('admin.subjects.index')->with('success', 'Subject approved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();

            return redirect()->route('admin.subjects.index')->with('success', 'Subject deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
