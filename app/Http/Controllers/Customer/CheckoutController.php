<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Session;
use App\shoppingCart;
use Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
       // dd('test');
       // dd(session()->all());
       //dd(Session::get('products'));
        $userId = Auth::user()->id;
           //$userCart_products= User::with("cart_products")->where('customer_profile_id',$userId)->orderBy('id')->get();
           
        $products = DB::table('shopping_cart')
        ->select('shopping_cart.id', 'products.name', 'products.price', 'products.weight', 'products.color', 'shopping_cart.quantity', 'products.image', 'products.description')
        ->join('products', 'shopping_cart.product_id', '=', 'products.id')
        ->where('shopping_cart.customer_profile_id', $userId)
        ->get();
        return view('customer.checkout', compact('products'));
    }

}
