<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;
use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyAnswerRequest;

class SurveyAnswerController extends Controller
{
    public function index()
    {
        $surveyAnswers = SurveyAnswer::get()->groupBy('survey_question_id');

        return view('admin.survey_answers.index', compact('surveyAnswers'));
    }

    public function create()
    {
        $questions = SurveyQuestion::get();

        return view('admin.survey_answers.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurveyAnswerRequest $request)
    {
        // dd($request);
        SurveyAnswer::create($request->all());

        return redirect()->route('admin.surveyAnswers.index')->with('success', 'SurveyAnswer added successfully.');
    }

    public function show(SurveyAnswer $surveyAnswer)
    {
        return view('admin.survey_answers.show', compact('surveyAnswer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyAnswer $surveyAnswer)
    {
        $questions = SurveyQuestion::get();
        $question = SurveyQuestion::where('id', $surveyAnswer->survey_question_id)->firstOrFail();

        return view('admin.survey_answers.edit', compact(['surveyAnswer', 'questions', 'question']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(SurveyAnswerRequest $request, SurveyAnswer $surveyAnswer)
    {
        $surveyAnswer->fill($request->all())->save();

        return redirect()->route('admin.surveyAnswers.index')->with('success', 'SurveyAnswer added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyAnswer $surveyAnswer)
    {
        try {
            $surveyAnswer->delete();

            return redirect()->route('admin.surveyAnswers.index')->with('success', 'SurveyAnswer deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
