<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Year;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Year $year)
    {
        $year = Category::where('year_id', $year->id)->get();

        return view('student.subjects_in_menu.index', compact(['year']));
    }
}
