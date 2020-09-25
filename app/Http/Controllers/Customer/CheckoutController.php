<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CheckoutController extends Controller
{
    public function checkout()
       {
          $products = Product::where('is_active', '1')->get();
           return view('customer.checkout', compact('products'));
      }
}
