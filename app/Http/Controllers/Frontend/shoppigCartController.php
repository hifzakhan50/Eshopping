<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\shoppingCart;
use Auth;


class shoppigCartController extends Controller
{
    public function addToCart(){
        session()->push('products', request()->all());

        $userId = Auth::user()->id;
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
    }

    public function remove($index)
    {
        $res=shoppingCart::where('id',$index)->delete();
    }

}
