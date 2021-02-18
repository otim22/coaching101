<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyBook extends Component
{
    public $book = [];

    public function mount($book)
    {
        $this->book = $book;
    }

    public function render()
    {
        return view('livewire.buy-book');
    }

    public function checkout($bookId): void
    {
        if(Auth::check()) {
            $user = Auth::user();
            $bookToBuy = Book::where('id', $bookId)->firstOrFail();
            // dd($bookToBuy);

            // $paymentToken = 'Ref-' . 'tx-'. time() . '-' . $user->id;
            // $currency = "UGX";
            // $userEmail = $user->email;
            // $userName= $user->name;
            // $bookPrice = $bookToBuy->price;
            // $redirectLink = "https://coaching101.app/cart";
            //
            // $response = Http::withToken(config('app.rave_key'))->post(
            //     'https://api.flutterwave.com/v3/charges', [
            //     "tx_ref" => $paymentToken,
            //     "amount"=> $bookPrice,
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

            $bookToBuy->subscribe();
        }

    }
}
