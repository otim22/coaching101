<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentProfileController extends Controller
{
    public function index()
    {
        $students = Profile::whereNotNull('dob')->paginate(20);

        return view('admin.profiles.students.index', compact('students'));
    }

    public function show(Profile $profile)
    {
        return view('admin.profiles.students.show', compact('user'));
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

            return redirect()->route('admin.profiles.students.index')->with('success', 'Profile deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
