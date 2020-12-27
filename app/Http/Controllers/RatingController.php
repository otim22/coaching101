<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        dd($request);

        $this->validate($request, [
            'rating' => 'required',
            'comment' => 'required',
            'user_id' => 'required',
            'subject_id' => 'required',
        ]);
        
        return redirect()->route('student.show')
                 ->with('success','Thanks for rating us');
    }
}
