<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->input('response');
        $message = $data !== null ? 'Transaction Successfull' : '';
        if (!empty($message)) {
            $request->session()->flash('success', $message);
        }
        return view('student.cart.index', [ 'response' => [$data] ]);
    }
}
