<?php

namespace App\Helpers;

use Config;
use Illuminate\Support\Facades\Http;

class ProcessPayment
{
    private $url = "https://api.flutterwave.com/v3/charges";
    public $data = [];
    private $key = "FLWSECK_TESTdf9f6e191043";

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function cardPayment() {
        $postData = $this->encrypt3Des(json_encode($this->data), $this->key);
        return $this->postPayment('card', ['client' => $postData]);
    }

    public function mobileMoney() {
        return $this->postPayment('mobile_money_uganda', $this->data);
    }

    protected function postPayment($type, $data) {
        return Http::withToken(config('app.rave_key'))->post(
            $this->url . '?type='. $type, $data
        );
    }

    protected function encrypt3Des($data, $key) {
        $encData = openssl_encrypt($data, 'DES-EDE3', $key, OPENSSL_RAW_DATA);
        return base64_encode($encData);
    }
}
