<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;

class TopCategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('pages.category.index', compact('category'));
    }
}
