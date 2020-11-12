<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OnBoardTeacherController extends Controller
{
    public function index()
    {
        return view('teacher.pages.index');
    }

    public function create()
    {
        return view('teacher.pages.start.index');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $user->role = $request->role;
        $user->save();

        return redirect()->route('manage.subjects');
    }
}
