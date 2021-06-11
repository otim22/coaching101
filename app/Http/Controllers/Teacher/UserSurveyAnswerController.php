<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\UserSurveyAnswer;
use Illuminate\Support\Facades\Auth;

class UserSurveyAnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     ''
        // ]);

        $surveyAnswerIds = $request->input('survey_answer_id');
        $standardId = $request->input('standard_id');
        $role = Role::where('name', 'teacher')->firstOrFail();
        $currentUser = User::with('roles')->find(Auth::id());

        $currentUser->syncRoles([$role->id]);
        $currentUser->standards()->attach($standardId);

        foreach($surveyAnswerIds as $surveyAnswerId) {
            UserSurveyAnswer::create([
                'survey_answer_id' => $surveyAnswerId,
                'user_id' => Auth::id()
            ]);
        }

        return redirect()->route('manage.subjects');
    }
}
