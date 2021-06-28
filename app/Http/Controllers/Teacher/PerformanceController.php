<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;
use App\Constants\GlobalConstants;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
{
    public function index()
    {
        $subjects = ItemContent::whereIn('id', function($query) {
            $query->select('subscriptionable_id')
                        ->from('subscriptions')
                        ->whereColumn('subscriptions.subscriptionable_id', 'item_contents.id');
        })->where('user_id', Auth::id())->get();

        return view('teacher.performance.index', compact('subjects'));
    }
}
