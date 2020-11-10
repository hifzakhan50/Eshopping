<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Session;
use App\shoppingCart;
use Auth;
class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
       // dd('test');
       // dd(session()->all());
       //dd(Session::get('products'));
        $userId = Auth::user()->id;
        if($request->session()->has('products'))
        {
            $products = Session::get('products');
            foreach ($products as $product){
               // dd($product);
                $productId = $product['id'];
                $productQuantity = $product['quantity'];
                $shoppingCart = new shoppingCart;
                $shoppingCart->product_id = $productId;
                $shoppingCart->customer_profile_id = $userId;
                $shoppingCart->quantity = $productQuantity;
                $shoppingCart->save();
            }
            Session::forget('products');

           //$userCart_products= User::with("cart_products")->where('customer_profile_id',$userId)->orderBy('id')->get();
           $products= shoppingCart::with("shoppingCart_products")->where('customer_profile_id',$userId)->orderBy('id','desc')->get();
           // dd($userCart_products);
            //   $products = shoppingCart::where('customer_profile_id',$userId);
            return view('customer.checkout', compact('products'));
        }else{
            //echo'testing cart';
            //return redirect()->route('homePage');
            //$products = shoppingCart::where('customer_profile_id',$userId);
           // $products = shoppingCart::where('customer_profile_id',$userId)->get();
            $products= shoppingCart::with("shoppingCart_products")->where('customer_profile_id',$userId)->orderBy('id','desc')->get();
            //dd($userCart_products);
            return view('customer.checkout', compact('products'));
        }
        //exit;
        //return view('customer.checkout', compact('products'));
    }

}
