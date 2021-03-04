<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;

class TopicsController extends Controller
{
    public function show(Subject $subject, Topic $topic)
    {
        return view('admin.videos.topics.show', compact(['subject', 'topic']));
    }
}
