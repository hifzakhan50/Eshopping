<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class sellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sellerDashboard()
    {
        //echo 'test';
        //exit;
        return view('seller.index');
    }

    public function sellerAds()
    {
        $ads = DB::table('campaigns')->select()->where('seller_profile_id', Auth::user()->id)->get();
        $seller = DB::table('seller_profiles')->select()->where('user_id', Auth::user()->id)->get();
        $seller = $seller[0]->id;
        $products = DB::table('products')->select()->where('seller_profile_id', $seller)->get();
        $data = array(
            'ads' => $ads,
            'products' => $products,
            'ads' =>$ads
        );
        return view('seller.adMan.all')->with($data);
    }

    public function saveAd(Request $request)
    {
        $user_id = Auth::user()->id;
        $adname = $request->input('name');
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        $budget = $request->input('budget');
        $product = $request->input('product');

        DB::insert('insert into campaigns (seller_profile_id, name, Starting_Date, Ending_Date, Budget, Products) 
        values (?, ?, ?, ?, ?, ?)',[$user_id, $adname, $startdate, $enddate, $budget, $product]);

        return redirect()->back()->with('success', 'Ad successfully created.');

    }

    public function activeOrders(){
        
        return view('seller.orders.active');
    }

    public function data1()
    {
        $activeorders = DB::table('orders')
        ->join('order_details', 'order_details.order_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->join('billing_address', 'billing_address.id', '=', 'orders.billing_id')
        ->select('orders.id', 'orders.status', 'orders.order_number', 'billing_address.fullname', 'billing_address.mobile', 'billing_address.house', 
        'billing_address.street', 'billing_address.province', 'billing_address.country', 'billing_address.postalcode', 'products.name', 'order_details.quantity')
        ->where('products.seller_profile_id', '=', auth()->user()->sellerProfile->id)
        ->where('orders.status', '=', 'Order Created')
        ->get();
            
        return Datatables::of($activeorders)
            ->addColumn('action', function ($activeorders) {

                $deliveredRoute = route('activeorder.delivered', $activeorders->id);
                $suspendRoute = route('activeorder.suspend', $activeorders->id);

                //$editBtn = '<a href="' . $editRoute . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>';
                $DelivredBtn = '<a href="' . $deliveredRoute . '" class="btn btn-sm btn-success"><i class="fa fa-tick"></i> Mark Delivered</a>';
                $suspendBtn = '<a href="' . $suspendRoute . '" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Suspend</a>';

                    return $DelivredBtn . ' ' . $suspendBtn;
            })
            ->make(true);
    }

    public function delivered($id){
        DB::update('update orders set status = ? where id = ?', ['Delivered', $id]);
        return redirect()->back()->with('success', 'Order Marked as Delivered.');
    }

    public function suspend($id){
        DB::update('update orders set status = ? where id = ?', ['Suspended', $id]);
        return redirect()->back()->with('success', 'Order Marked as Suspended.');
    }


    public function allOrders(){
        
        return view('seller.orders.allorders');
    }

    public function data2()
    {
        $activeorders = DB::table('orders')
        ->join('order_details', 'order_details.order_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->join('billing_address', 'billing_address.id', '=', 'orders.billing_id')
        ->select('orders.id', 'orders.status', 'orders.order_number', 'billing_address.fullname', 'billing_address.mobile', 'billing_address.house', 
        'billing_address.street', 'billing_address.province', 'billing_address.country', 'billing_address.postalcode', 'products.name', 'order_details.quantity')
        ->where('products.seller_profile_id', '=', auth()->user()->sellerProfile->id)
        ->where('orders.status', '!=', 'Order Created')
        ->get();
            
        return Datatables::of($activeorders)
            ->addColumn('action', function ($activeorders) {
            })
            ->make(true);
    }

}
