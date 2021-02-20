<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BuyNote extends Component
{
    public $note = [];

    public function mount($note)
    {
        $this->note = $note;
    }

    public function render()
    {
        return view('livewire.buy-note');
    }

    public function checkout($noteId): void
    {
        if(Auth::check()) {
            $user = Auth::user();
            $noteToBuy = Note::where('id', $noteId)->firstOrFail();
            // $paymentToken = 'Ref-' . 'tx-'. time() . '-' . $user->id;
            // $currency = "UGX";
            // $userEmail = $user->email;
            // $userName= $user->name;
            // $notePrice = $noteToBuy->price;
            // $redirectLink = "https://coaching101.app/cart";
            //
            // $response = Http::withToken(config('app.rave_key'))->post(
            //     'https://api.flutterwave.com/v3/charges', [
            //     "tx_ref" => $paymentToken,
            //     "amount"=> $notePrice,
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

            $noteToBuy->subscribe();
        }
    }
}
