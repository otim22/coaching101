<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ItemContent;

class TeacherController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $teacher)
    {
        $subjects = ItemContent::where(['user_id' => $teacher->id, 'item_id' => 1, 'is_approved' => 1])->paginate(12);
        $books = ItemContent::where(['user_id' => $teacher->id, 'item_id' => 2, 'is_approved' => 1])->paginate(12);
        $notes = ItemContent::where(['user_id' => $teacher->id, 'item_id' => 3, 'is_approved' => 1])->paginate(12);
        $pastpapers = ItemContent::where(['user_id' => $teacher->id, 'item_id' => 4, 'is_approved' => 1])->paginate(12);

        return view('teacher.subjects.index', compact(['subjects', 'teacher', 'books', 'notes', 'pastpapers']));
    }
}
