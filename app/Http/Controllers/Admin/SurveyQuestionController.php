<?php

namespace App\Http\Controllers\Admin;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Models\SurveyQuestion;
use App\Http\Controllers\Controller;

class SurveyQuestionController extends Controller
{
    public function index()
    {
        $surveyQuestions = SurveyQuestion::get();

        return view('admin.survey_questions.index', compact('surveyQuestions'));
    }

    public function create()
    {
        $survey = Survey::get()->first();

        return view('admin.survey_questions.create', compact('survey'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' =>  'required|string',
            'survey_id' => 'required|integer',
        ]);

        SurveyQuestion::create($request->all());

        return redirect()->route('admin.surveyQuestions.index')->with('success', 'SurveyQuestion added successfully.');
    }

    public function show(SurveyQuestion $surveyQuestion)
    {
        return view('admin.survey_questions.show', compact('surveyQuestion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyQuestion $surveyQuestion)
    {
        return view('admin.survey_questions.edit', compact('surveyQuestion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyQuestion $surveyQuestion)
    {
        $request->validate([
            'question' =>  'required', 'string'
        ]);

        $surveyQuestion->fill($request->all())->save();

        return redirect()->route('admin.surveyQuestions.index')->with('success', 'SurveyQuestion added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyQuestion $surveyQuestion)
    {
        try {
            $surveyQuestion->delete();

            return redirect()->route('admin.surveyQuestions.index')->with('success', 'SurveyQuestion deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
