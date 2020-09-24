<?php

namespace App\Http\Controllers;

use App\Models\SubjectMessage;
use Illuminate\Http\Request;

class SubjectMessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'welcome_message' => 'required|string',
            'congragulation_message' => 'required|string'
        ]);

        SubjectMessage::create($request->all());

        return back();
    }
}
