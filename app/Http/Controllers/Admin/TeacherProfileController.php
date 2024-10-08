<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherProfileController extends Controller
{
    public function index()
    {
        $teachers = Profile::with(['user', 'year', 'category'])->whereNotNull('category_id')->paginate(20);

        return view('admin.profiles.teachers.index', compact('teachers'));
    }

    public function show(Profile $teacher)
    {
        return view('admin.profiles.teachers.show', compact('teacher'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        try {
            $profile->delete();

            return redirect()->route('admin.profiles.teachers.index')->with('success', 'Profile deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
