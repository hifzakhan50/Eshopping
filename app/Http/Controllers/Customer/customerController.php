<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Yajra\DataTables\Facades\DataTables;


class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerDashboard()
    {
        return view('customer.index');
    }

    public function allorders()
    {
        $activeorders = DB::table('orders')
        ->join('order_details', 'order_details.order_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->join('billing_address', 'billing_address.id', '=', 'orders.billing_id')
        ->select('orders.id', 'orders.status', 'orders.order_number', 'billing_address.fullname', 'billing_address.mobile', 'billing_address.house', 
        'billing_address.street', 'billing_address.province', 'billing_address.country', 'billing_address.postalcode', 'products.name', 'order_details.quantity')
        ->where('orders.customer_profile_id', '=', auth()->user()->id)
        ->get();
            
        return Datatables::of($activeorders)
            ->make(true);
    }
}
