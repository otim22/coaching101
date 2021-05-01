<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Donation;
use App\Helpers\ProcessPayment as Payment;

class Checkout extends Component
{
    private $url = "https://api.flutterwave.com/v3/charges";
    public $donor = "";
    public $cardDetails = [];

    public function mount($donor)
    {
        $this->donor = $donor;
    }

    public function render()
    {
        return view('livewire.checkout', $this->renderData());
    }

    public function renderData()
    {
        return [
            'donationDetails' => $this->getDonor(),
        ];
    }

    public function checkout()
    {
        $data = array_merge($this->setPaymentDefaults(), [
            "payment_options" => "card",
            "card_number" => $this->cardDetails['number'],
            "cvv" => $this->cardDetails['cvv'],
            "expiry_month" => $this->cardDetails['expiryMonth'],
            "expiry_year" => $this->cardDetails['expiryYear'],
            "fullname" => $this->getDonor()->sponsor_name,
            "customizations" => [
                "title" => "OTF Payments",
                "description" => "Your transaction is secure with us.",
                "logo" => "https://assets.piedpiper.com/logo.png"
            ]
        ]);

        $payment = new Payment($data, $this->url);
        $response = $payment->cardPayment();
        $data = json_decode($response->body(), true);

        if ($response->successful()) {
            $status = $response['data']['status'];
            if ($status == 'successful') {
                $this->emit('onSuccess', $data);
                $donor = $this->getDonor()->id;
                return redirect()->route('donate.show', $donor);
            }
        }
        if ($data['status'] == 'error') {
            $this->emit('onError', $data);
        }
    }

    public function proccessMobileMoney($data)
    {
        $data = array_merge($this->setPaymentDefaults(), [
            "network" => strtoupper($data['network']),
            "phone_number" => $data['phoneNumber']
        ]);
        $payment = new Payment($data, $this->url);
        $response = $payment->mobileMoney();
        $data = json_decode($response->body(), true);
        if ($response->successful()) {
            $this->emit('onSuccess', $data);
            $donor = $this->getDonor()->id;
            return redirect()->route('donate.show', $donor);
        }
        if ($data['status'] == 'error') {
            $this->emit('onError', $data);
        }
    }

    private function setPaymentDefaults() {
        $user =  $this->getDonor();
        $paymentToken = 'REF-' . 'TX-'. time() . '-' . $user->id;
        $currency = $user->currency;
        $userEmail = $user->sponsor_email;
        $donationSum = $user->amount;
        $redirectLink = "https://coaching101.app/donations";

        return [
            "tx_ref" => $paymentToken,
            "amount"=> '1000',
            "currency"=> $currency,
            "redirect_url" => $redirectLink,
            "email" => $userEmail,
            "meta" => [
                "consumer_id" => $user->id
            ]
        ];
    }

    private function getDonor()
    {
        return Donation::where('id', $this->donor)->firstOrFail();
    }
}
