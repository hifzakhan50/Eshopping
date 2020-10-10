<?php

namespace App\Http\Controllers\Frontend\BillingAdress;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class billingAdress extends Controller
{
    public function addBilling()
    {
        return view('frontend.BillingAdress.billing-address');
    }
}
