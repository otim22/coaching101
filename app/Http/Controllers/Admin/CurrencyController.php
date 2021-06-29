<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::get();

        return view('admin.currencies.index', compact('currencies'));
    }

    public function create()
    {
        return view('admin.currencies.create');
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
            'name' =>  'required|string',
        ]);

        Currency::create($request->all());

        return redirect()->route('admin.currencies.index')->with('success', 'Currency added successfully.');
    }

    public function show(Currency $currency)
    {
        return view('admin.currencies.show', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('admin.currencies.edit', compact('currency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        $request->validate([
            'name' =>  'required', 'string'
        ]);

        $currency->fill($request->all())->save();

        return redirect()->route('admin.currencies.index')->with('success', 'Currency added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        try {
            $currency->delete();

            return redirect()->route('admin.currencies.index')->with('success', 'Currency deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
