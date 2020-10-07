<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    public function index()
    {
        return view('pages.subject.messages.index');
    }

    public function create(Subject $subject)
    {
        return view('pages.subject.messages.index', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('pages.subject.messages.edit', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request, Subject $subject)
    {
        $message =  new Message;

        $message->welcome_message = $request->welcome_message;
        $message->congragulation_message = $request->congragulation_message;

        $subject->addMessage($message);

        return redirect()->route('subjects.show', $subject);
    }
}
