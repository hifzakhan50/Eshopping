<?php

namespace App\Http\Controllers\Frontend\OrderConfirmationDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\shoppingCart;

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
            'address' => $address,
        );
        return view('frontend.OrderConfirmationDetails.order-confirmation-detail')->with($data);
    }

    public function placeFinalOrder(Request $request)
    {
        $billing_id = $request['addressid'];
        $status = "Order Created";
        $customer_id = Auth::user()->id;
        $today = Carbon::now()->toDateString();
        $order_number = 'MEGAS-'.strtoupper(uniqid());

        $userId = Auth::user()->id;
        $products = DB::table('shopping_cart')
        //->select('shopping_cart.id', 'products.name', 'products.price', 'products.weight', 'products.color', 'shopping_cart.quantity', 'products.image', 'products.description')
        ->select('shopping_cart.id', 'products.id as productid', 'products.name', 'products.price', 'products.weight', 'products.color', 'shopping_cart.quantity', 'products.image', 'products.description')
        ->join('products', 'shopping_cart.product_id', '=', 'products.id')
        ->where('shopping_cart.customer_profile_id', $userId)
        ->get();

        $total_price = 0;
        foreach($products as $index => $product) 
        {
            $total_price = $total_price + ($product->price * $product->quantity);
        }

        $GST = ($total_price / 100) * 17;

        DB::insert('insert into orders 
        (customer_profile_id, billing_id, order_number, order_date, status, total, 	sales_tax) 
        values (?, ?, ?, ?, ?, ? ,?)', 
        [$userId, $billing_id, $order_number, $today, $status, $total_price, $GST]);

        $order_id = DB::select('select id from orders where order_number = ?', [$order_number]);
        
        foreach($products as $product)
        {
            DB::insert('insert into order_details (order_id, product_id, quantity) values (?, ?, ?)', [$order_id[0]->id, $product->productid, $product->quantity]);
        }
        $res=shoppingCart::where('customer_profile_id',$userId)->delete();
        return view('frontend.OrderSuccess.order-success')->with('order_number', $order_number);
    }
}
