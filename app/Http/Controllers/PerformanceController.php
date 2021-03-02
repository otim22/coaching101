<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
{
    public function index()
    {
        $subjects = Subject::where('user_id', Auth::id())->get();

        return view('teacher.performance.index', compact('subjects'));
    }
}
