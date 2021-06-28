<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Standard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::get();

        return view('admin.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $standards = Standard::get();

        return view('admin.levels.create', compact('standards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'standard_id' => 'required|integer',
        ]);

        $level = new Level();
        $level->name = $request->name;
        $level->standard_id = $request->standard_id;
        $level->save();

        return redirect()->route('admin.levels.index')->with('success', 'Level added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        return view('admin.levels.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        $standards = Standard::get();
        $standard = Standard::find($level->standard_id);

        return view('admin.levels.edit', compact(['level', 'standards', 'standard']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|string',
            'standard_id' => 'required|integer',
        ]);

        $level->fill($request->all())->save();

        return redirect()->route('admin.levels.index')->with('success', 'Level updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        try {
            $level->delete();

            return redirect()->route('admin.levels.index')->with('success', 'Level deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
