<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
       $this->middleware('admin');
    }

    public function index()
    {
        $studentCount = User::role('student')->get()->count();
        $teacherCount = User::role('teacher')->get()->count();
        $userCount = $studentCount + $teacherCount;

        $subjectCount = ItemContent::where('item_id', 1)->count();
        $bookCount = ItemContent::where('item_id', 2)->count();
        $noteCount = ItemContent::where('item_id', 3)->count();
        $pastpaperCount = ItemContent::where('item_id', 4)->count();

        return view('admin.index', compact([
            'userCount', 'studentCount', 'teacherCount', 'subjectCount', 'bookCount', 'noteCount', 'pastpaperCount'
        ]));
    }

    public function adminUser()
    {
        $admins = User::role('admin')->get();

        return view('admin.users.admins.index', compact('admins'));
    }

    public function approve(User $student)
    {
        $approveUser = User::find($student->id);

        if($approveUser->role == "student") {
            $approveUser->role = "admin";
            $approveUser->save();
        } else {
            return redirect()->route('admin.admins.index')->with('info', 'User already approved');
        }

        return redirect()->route('admin.admins.index')->with('success', 'User approved successfully');
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

            return redirect()->route('admin.admins.index')->with('success', 'Admin deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
