<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PastPaper;
use Illuminate\Support\Facades\Auth;

class BuyPastpaper extends Component
{
    public $pastpaper = [];

    public function mount($pastpaper)
    {
        $this->pastpaper = $pastpaper;
    }

    public function render()
    {
        return view('livewire.buy-pastpaper');
    }

    public function checkout($pastpaperId): void
    {
        if(Auth::check()) {
            $user = Auth::user();
            $pastpaperToBuy = PastPaper::where('id', $pastpaperId)->firstOrFail();
            // $paymentToken = 'Ref-' . 'tx-'. time() . '-' . $user->id;
            // $currency = "UGX";
            // $userEmail = $user->email;
            // $userName= $user->name;
            // $pastpaperPrice = $pastpaperToBuy->price;
            // $redirectLink = "https://coaching101.app/cart";
            //
            // $response = Http::withToken(config('app.rave_key'))->post(
            //     'https://api.flutterwave.com/v3/charges', [
            //     "tx_ref" => $paymentToken,
            //     "amount"=> $pastpaperPrice,
            //     "currency"=> $currency,
            //     "redirect_url" => $redirectLink,
            //     "payment_options" => "card",
            //     "meta" => [
            //         "consumer_id" => Auth::id()
            //     ],
            //     "customer" => [
            //         "email" => $userEmail,
            //         "name" => $userName
            //     ],
            //     "customizations" => [
            //         "title" => "OTF Payments",
            //         "description" => "Middleout isn't free. Pay the price",
            //         "logo" => "https://assets.piedpiper.com/logo.png"
            //     ]
    		// ]);

            $pastpaperToBuy->subscribe();
        }
    }
}
