<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;

class TopCategoryController extends Controller
{
    public function index(Category $category)
    {
        $subjects = Subject::where('category_id', $category->id)->paginate(12);

        return view('pages.subject_category.index', compact(['subjects', 'category']));
    }
}
