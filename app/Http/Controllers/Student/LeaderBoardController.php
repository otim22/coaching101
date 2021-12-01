<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaderBoardController extends Controller
{
    public function index()
    {
        return view('student.exams.leader_board.index');
    }
}
