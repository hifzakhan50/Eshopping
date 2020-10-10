<?php

namespace App\Http\Controllers\Frontend\ShoppingCart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class shoppingCart extends Controller
{
    public function viewCart()
    {
        return view('frontend.Shopping cart.shoppingcart');
    }
}
