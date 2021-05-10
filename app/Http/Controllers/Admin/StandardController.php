<?php

namespace App\Http\Controllers\Admin;

use App\Models\Standard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $standards = Standard::get();

        return view('admin.standards.index', compact('standards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.standards.create');
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
        ]);

        Standard::create(['name' => $request->name]);

        return redirect()->route('admin.standards.index')->with('success', 'Standard added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Standard $standard)
    {
        return view('admin.standards.show', compact('standard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Standard $standard)
    {
        return view('admin.standards.edit', compact('standard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Standard $standard)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $standard->fill($request->all())->save();

        return redirect()->route('admin.standards.index')->with('success', 'Standard updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Standard $standard)
    {
        try {
            $standard->delete();

            return redirect()->route('admin.standards.index')->with('success', 'Standard deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
