<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectSubscriptionController extends Controller
{
    public function store(Subject $subject, $topicId)
    {
        $subject->subscribe();
    }

    public function destroy(Subject $subject, $topicId)
    {
        $subject->unsubscribe();
    }
}
