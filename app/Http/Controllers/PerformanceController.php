<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Constants\GlobalConstants;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
{
    public function index()
    {
        $subjects = Subject::whereIn('id', function($query) {
            $query->select('subscriptionable_id')
                        ->from('subscriptions')
                        ->whereColumn('subscriptions.subscriptionable_id', 'subjects.id');
        })->where('user_id', Auth::id())->get();
        // dd($subjects);
        // $subjects = Subject::getSubjectsForTeacherPerforamce(GlobalConstants::ALL_TIME)->where('user_id', Auth::id())->get();

        return view('teacher.performance.index', compact('subjects'));
    }

    public function getMoreSubjectsTeacherPerforamce(Request $request)
    {
        $days = $request->performance_filter;

        if ($request->ajax()) {
            $subjects = Subject::getSubjectsForTeacherPerforamce($days);

            return view('teacher.performance.filtered_subjects', compact('subjects'));
        }
    }
}
