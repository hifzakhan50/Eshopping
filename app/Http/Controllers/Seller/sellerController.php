<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

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

}
