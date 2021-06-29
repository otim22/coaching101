<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($donor)
    {
        return view('donation.checkout.index', compact('donor'));
    }
}
