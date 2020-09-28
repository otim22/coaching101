<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Requests\SubjectIntroductionRequest;

class SubjectController extends Controller
{
    public function store(SubjectIntroductionRequest $request)
    {
        $subjectIntroduction = new Subject($request->except(['cover_image']));
        $subjectIntroduction->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $subjectIntroduction->addMediaFromRequest('cover_image')->toMediaCollection('default');
        }

        return redirect()->back();
    }
}
