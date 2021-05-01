<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Rules\NameValidator;

class DonationController extends Controller
{
    public function index()
    {
        return view("donation.index");
    }

    public function store(Request $request)
    {
        $request->validate([
            'sponsor_name' => ['required', 'string', 'max:255', new NameValidator],
            'sponsor_email' => ['required', 'string', 'email', 'max:255'],
            'sponsee_name' => ['nullable', 'string', 'max:255'],
            'sponsee_email' => ['nullable', 'string', 'email', 'max:255'],
            'interval' => ['nullable', 'string', 'max:25'],
            'currency' => ['required', 'string', 'max:10'],
            'amount' => 'required',
        ]);

        $donor = Donation::create($request->all());

        return redirect()->route('checkout.index', $donor);
    }

    public function show(Donation $donor)
    {
        return view("donation.show", compact('donor'));
    }
}
