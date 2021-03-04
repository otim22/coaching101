<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
       $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function adminUser()
    {
        $admins = User::where('role', 3)->get();

        return view('admin.users.admins.index', compact('admins'));
    }

    public function approve(User $student)
    {
        $approveUser = User::find($student->id);

        if($approveUser->role == 1) {
            $approveUser->role = 3;
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
