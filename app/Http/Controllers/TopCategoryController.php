<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;

class TopCategoryController extends Controller
{
    public function index(Category $category)
    {
        $subjects = ItemContent::where(['category_id' => $category->id, 'is_approved' => 1])->paginate(12);

        return view('student.subject_category.index', compact(['subjects', 'category']));
    }
}
