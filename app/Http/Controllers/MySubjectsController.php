<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class MySubjectsController extends Controller
{
    public function index()
    {
        return view('student.my_subjects.index');
    }
}
