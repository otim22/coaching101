<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class ProcessPayment
{
    public $data = [];

    public function __construct($data, $url)
    {
        $this->data = $data;
        $this->url = $url;
    }

    public function cardPayment() {
        $postData = $this->encrypt3Des(json_encode($this->data), config('app.encryption_key'));
        return $this->postPayment('card', ['client' => $postData], $this->url);
    }

    public function mobileMoney() {
        return $this->postPayment('mobile_money_uganda', $this->data, $this->url);
    }

    protected function postPayment($type, $data, $url) {
        return Http::withToken(config('app.rave_key'))->post(
            $this->url . '?type='. $type, $data
        );
    }

    protected function encrypt3Des($data, $key) {
        $encData = openssl_encrypt($data, 'DES-EDE3', $key, OPENSSL_RAW_DATA);
        return base64_encode($encData);
    }
}
