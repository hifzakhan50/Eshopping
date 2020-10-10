<?php

namespace  App\Http\Controllers\Frontend\OrderuSuccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class orderSuccess extends Controller
{
    public function orderSuccessMsg()
    {
       // echo ' THANK YOU APNY PAISAY HMY DNY K LYEEEEEEEEEEEE' AB NKLO;
       return view('frontend.OrderSuccess.order-success');
    }

}
