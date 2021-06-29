<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Note;
use App\Models\Book;
use App\Models\Subject;
use App\Models\Pastpaper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 1)->paginate(20);

        return view('admin.users.students.index', compact('students'));
    }

    public function show(User $student)
    {
        return view('admin.users.students.show', compact('student'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        try {
            $student->delete();

            return redirect()->route('admin.users.students.index')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
