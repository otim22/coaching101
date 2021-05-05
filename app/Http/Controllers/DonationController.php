<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Rules\NameValidator;
use Illuminate\Support\Facades\Http;

class DonationController extends Controller
{
    private $url = "https://api.flutterwave.com/v3/payment-plans";

    public function index()
    {
        return view("donation.index");
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => ['required', 'string', 'max:255', new NameValidator],
            'email' => ['required', 'string', 'email', 'max:255'],
            'interval' => ['nullable', 'string', 'max:25'],
            'duration' => 'nullable',
            'currency' => ['required', 'string', 'max:6'],
            'amount' => 'required',
        ]);

        $paymentPlanData = $this->createPaymentPlan($requestData);
        $donor = new Donation();
        $donor->name = $request->name;
        $donor->email = $request->email;
        $donor->interval = $request->interval;
        $donor->duration = $request->duration;
        $donor->payment_plan_id = $paymentPlanData['id'];
        $donor->currency = $request->currency;
        $donor->amount = $request->amount;
        $donor->save();

        $donor = Donation::where('id', $donor->id)->firstOrFail();

        return view('donation.checkout.index', compact('donor'));
    }

    public function show(Donation $donor)
    {
        return view('donation.show', compact('donor'));
    }

    /** Create a payment plan */
    protected function createPaymentPlan($requestData)
    {
        $paymentPlanPayload = [
            "amount" => $requestData['amount'],
            "name" =>  "Donation collection plan",
            "interval" =>  $requestData['interval'],
            "duration" => $requestData['duration'],
            "currency" => $requestData['currency']
        ];

        $response = Http::withToken(config('app.rave_key'))->post($this->url, $paymentPlanPayload);
        $data = json_decode($response->body(), true);

        if ($response->successful()) {
            if ($data['status'] == 'success') {
                return $data['data'];
            }
        }
    }

    public function cancelDonation(Request $request)
    {
        $userCancellation = Donation::where('email', $request->email)->latest()->firstOrFail();
        $response = Http::withToken(config('app.rave_key'))->put($this->url . "/" . $userCancellation->payment_plan_id . "/cancel");
        $data = json_decode($response->body(), true);

        if ($response->successful()) {
            if ($response['status'] == 'success') {
                return redirect()->route('donate.index')->with("success", $data['message']);
            } else {
                return redirect()->back()->with('error', "Sorry, we couldn't cancel the donation... Try again later.");
            }
        }
    }
}
