<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectIntroduction;
use App\Requests\SubjectIntroductionRequest;

class SubjectIntroductionController extends Controller
{
    public function store(SubjectIntroductionRequest $request)
    {
        $subjectIntroduction = new SubjectIntroduction($request->except(['cover_image']));
        $subjectIntroduction->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $subjectIntroduction->addMediaFromRequest('cover_image')->toMediaCollection('default');
        }

        return back();
    }
}
