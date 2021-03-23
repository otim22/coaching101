<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 2)->paginate(20);

        return view('admin.users.teachers.index', compact('teachers'));
    }

    public function show(User $teacher)
    {
        return view('admin.users.teachers.show', compact('teacher'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        try {
            $teacher->delete();

            return redirect()->route('admin.users.teachers.index')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
