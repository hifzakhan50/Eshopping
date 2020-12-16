<?php

namespace App\Http\Controllers\Frontend\OrderConfirmationDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class orderConfirmationDetail extends Controller
{
    public function confirmOrder(Request $request)
    {
        $address_id = $request['id'];
        $userId = Auth::user()->id;
           
        $products = DB::table('shopping_cart')
        ->select('shopping_cart.id', 'products.name', 'products.price', 'products.weight', 'products.color', 'shopping_cart.quantity', 'products.image', 'products.description')
        ->join('products', 'shopping_cart.product_id', '=', 'products.id')
        ->where('shopping_cart.customer_profile_id', $userId)
        ->get();
        $address = DB::select('select * from billing_address where id = ?', [$address_id]);

        $data = array(
            'products' => $products,
            'address' => $address
        );
        return view('frontend.OrderConfirmationDetails.order-confirmation-detail')->with($data);
    }
}
