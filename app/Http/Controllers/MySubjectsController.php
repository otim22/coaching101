<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MySubjectsController extends Controller
{
    public function index()
    {
        return view('app.my_subjects.index');
    }
}
