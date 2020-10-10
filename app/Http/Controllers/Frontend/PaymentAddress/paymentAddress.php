<?php

namespace App\Http\Controllers\Frontend\PaymentAddress;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class paymentAddress extends Controller
{
    public function addPaymentAddress()
    {
        return view('frontend.Payment Address.payment-address');
    }
    public function store()
    {

        dd(request()->all());

        $data = request()->validate([

            'payment-type'=>'required'
        ]);
}}
