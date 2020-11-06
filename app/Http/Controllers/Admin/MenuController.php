<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $navItems = Menu::get();
        $menus = Menu::whereNull('parent_id')->get();
        $allMenus = Menu::pluck('title', 'id')->all();
        // dd($navItems);
        return view('admin.menus.index', compact('menus','allMenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::whereNull('parent_id')->get();
        $allMenus = Menu::pluck('title', 'id')->all();

        return view('admin.menus.create', compact('menus', 'allMenus'));
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
            'title' => 'required|string',
        ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        Menu::create($input);

        return redirect()->route('admin.menus.index')->with('success', 'Menu added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('admin.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $allMenus = Menu::pluck('title', 'id')->all();

        return view('admin.menus.edit', compact('menu', 'allMenus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string',
            'parent_id' => 'nullable|exists:nav_items,id',
        ]);

        $Menu->fill($request->all())->save();

        return redirect()->route('admin.menus.index')->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();

            return redirect()->route('admin.menus.index')->with('success', 'Menu deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
