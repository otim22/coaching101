<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectOutlineController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            //
        ]);

        dd($request);
    }
}
