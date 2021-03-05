<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $teacher)
    {
        $subjects = Subject::where(['user_id' => $teacher->id, 'is_approved' => 1])->paginate(8);
        
        return view('teacher.teacher_subjects.index', compact(['subjects', 'teacher']));
    }
}
