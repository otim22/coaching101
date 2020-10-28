<?php

namespace App\Http\Controllers\Admin;

use App\Models\NavItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NavItem  $navItem
     * @return \Illuminate\Http\Response
     */
    public function show(NavItem $navItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NavItem  $navItem
     * @return \Illuminate\Http\Response
     */
    public function edit(NavItem $navItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NavItem  $navItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NavItem $navItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NavItem  $navItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(NavItem $navItem)
    {
        //
    }
}
