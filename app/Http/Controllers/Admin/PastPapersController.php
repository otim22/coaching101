<?php

namespace App\Http\Controllers\Admin;

use App\Models\PastPaper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PastPapersController extends Controller
{
    public function index()
    {
        $pastpapers = PastPaper::paginate(12);

        return view('admin.pastpapers.index', compact('pastpapers'));
    }
}
