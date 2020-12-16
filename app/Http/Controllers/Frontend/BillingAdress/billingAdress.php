<?php

namespace App\Http\Controllers\Frontend\BillingAdress;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class billingAdress extends Controller
{
    public function addBilling()
    {
        $user_id = Auth::user()->id;
        $data = DB::select('select * from billing_address where user_id = ?', [Auth::user()->id]);

        return view('frontend.BillingAdress.billing-address')->with('data', $data);
    }
}
