<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Term;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;
use App\Http\Requests\PastpaperRequest;

class PastpaperController extends Controller
{
    public function index()
    {
        $pastpapers = ItemContent::where('item_id', 4)->paginate(20);

        return view('admin.pastpapers.index', compact('pastpapers'));
    }

    public function show(ItemContent $pastpaper)
    {
        return view('admin.pastpapers.show', compact('pastpaper'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemContent $pastpaper)
    {
        try {
            $pastpaper->delete();

            return redirect()->route('admin.pastpapers.index')->with('success', 'Pastpaper deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function approve(ItemContent $pastpaper)
    {
        $approvePastpaper = ItemContent::find($pastpaper->id);

        if($approvePastpaper->is_approved == 0) {
            $approvePastpaper->is_approved = 1;
            $approvePastpaper->save();
        } else {
            return redirect()->route('admin.pastpapers.index')->with('info', 'Pastpaper already approved');
        }

        return redirect()->route('admin.pastpapers.index')->with('success', 'Pastpaper approved successfully');
    }
}
