<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.cart.index', [ 'response' => [$request->input('response')] ]);
    }
}
