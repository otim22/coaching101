<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaderBoardController extends Controller
{
    public function index()
    {
        return view('student.quizzes.leader_board.index');
    }
}
