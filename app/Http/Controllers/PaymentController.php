<?php

namespace App\Http\Controllers;

use Rave;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function initialize()
    {
       Rave::initialize(route('callback'));
   }

   public function callback(Request $request)
   {
       $data =Rave::verifyTransaction($request->txref);
       dd($data);

       // view the data response
    ﻿   if ($data->status == 'success') {
            //do something to your database
        ﻿﻿} else {
            //return invalid payment﻿
        ﻿}

       // $resp = $request->resp;
       // $body = json_decode($resp, true);
       // $txRef = $body['data']['data']['txRef'];
       // $data = Rave::verifyTransaction($txRef);
       // dd($data);
   }
}
