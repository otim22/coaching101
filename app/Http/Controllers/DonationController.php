<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\NameValidator;
use App\Models\DonationUser;
use App\Models\DonationPayment;
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
        $requestData = $this->validateUser($request);
        $paymentPlanData = $this->createPaymentPlan($requestData);
        $donorAvailable = DonationUser::where('email', '=', $requestData['email'])->exists();

        if (!$donorAvailable) {
            $this->saveDonor($requestData);
            $newDonor = $this->getUserDonated($requestData);
            $this->saveDonationDetails($requestData, $paymentPlanData, $newDonor);
        } else {
            $newDonor = $this->getUserDonated($requestData);
            $this->saveDonationDetails($requestData, $paymentPlanData, $newDonor);
        }

        $donor = DonationPayment::where('donation_user_id', $this->getUserDonated($requestData)->id)->firstOrFail();

        return view('donation.checkout.index', compact('donor'));
    }

    protected function getUserDonated($requestData)
    {
        return DonationUser::where('email', '=', $requestData['email'])->firstOrFail();
    }

    protected function validateUser($request)
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255', new NameValidator],
            'email' => ['required', 'string', 'email', 'max:255'],
            'interval' => ['nullable', 'string', 'max:25'],
            'duration' => 'nullable',
            'currency' => ['required', 'string', 'max:6'],
            'amount' => 'required',
        ]);
    }

    protected function saveDonor($requestData)
    {
        $donationUser = new DonationUser();
        $donationUser->name = $requestData['name'];
        $donationUser->email = $requestData['email'];
        $donationUser->save();
    }

    protected function saveDonationDetails($requestData, $paymentPlanData, $newDonor)
    {
        $donationDetails = new DonationPayment();
        $donationDetails->interval = $requestData['interval'];
        $donationDetails->duration = $requestData['duration'];
        $donationDetails->payment_plan_id = $paymentPlanData['id'];
        $donationDetails->currency = $requestData['currency'];
        $donationDetails->amount = $requestData['amount'];
        $donationDetails->donation_user_id = $newDonor->id;
        $donationDetails->save();
    }

    public function show(DonationUser $donor)
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
        $userCancellation = DonationUser::where('email', $request->email)->firstOrFail();
        $paymentCancellation = DonationPayment::where('donation_user_id', $userCancellation->id)->latest()->firstOrFail();

        $response = Http::withToken(config('app.rave_key'))->put($this->url . "/" . $paymentCancellation->payment_plan_id . "/cancel");
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
