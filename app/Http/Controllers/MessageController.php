<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    public function index()
    {
        return view('teacher.videos.messages.index');
    }

    public function create(ItemContent $subject)
    {
        return view('teacher.videos.messages.index', compact('subject'));
    }

    public function edit(ItemContent $subject)
    {
        return view('teacher.videos.messages.edit', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request, ItemContent $subject)
    {
        $message =  new Message;

        $message->welcome_message = $request->welcome_message;
        $message->congragulation_message = $request->congragulation_message;

        $subject->addMessage($message);

        return redirect()->route('subjects.show', $subject);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request, ItemContent $subject, Message $message)
    {
        $message->welcome_message = $request->welcome_message;
        $message->congragulation_message = $request->congragulation_message;

        $subject->updateMessage($message);

        return redirect()->route('subjects.show', $subject)->with('success', 'Messages updated successfully');;
    }
}
