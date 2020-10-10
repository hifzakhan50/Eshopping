<?php

namespace App\Http\Controllers\Frontend\OrderConfirmationDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class orderConfirmationDetail extends Controller
{
    public function confirmOrder()
    {
       // echo ' CONFIRM YOUR ORDER HERE';
        return view('frontend.OrderConfirmationDetails.order-confirmation-detail');
    }
}
