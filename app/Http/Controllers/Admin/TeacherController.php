<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 2)->paginate(20);

        return view('admin.users.teachers.index', compact('teachers'));
    }

    public function show(User $teacher)
    {
        $subjects = ItemContent::whereIn('item_id', function($query) {
            $query->select('subscriptionable_id')
                        ->from('subscriptions')
                        ->whereColumn('subscriptions.subscriptionable_id', 'item_contents.id');
        })->where('user_id', $teacher->id)->get();
        
        $subjectTaught = Category::where('id', $teacher->profile->category_id)->firstOrFail()->name;

        return view('admin.users.teachers.show', compact(['teacher', 'subjects', 'subjectTaught']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        try {
            $teacher->delete();

            return redirect()->route('admin.users.teachers.index')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
