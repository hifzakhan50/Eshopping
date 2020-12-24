<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', '1')->get();

        $today = Carbon::now()->toDateString();

        $ads = DB::table('campaigns')->join('products', 'campaigns.Products', '=', 'products.id')->select(
            'campaigns.id as id',
            'products.name as name',
            'products.price as price',
            'products.size as size',
            'products.color as color',
            'campaigns.impressions as imp',
            'products.image as image',
            'campaigns.is_active',
            'campaigns.Ending_Date'
        )->where('campaigns.is_active', 1)
        ->where('campaigns.Ending_Date', '>=', $today)
        ->inRandomOrder()->limit(3)->get();
        // dd($ads);
        foreach($ads as $ad)
        {
            DB::update('update campaigns set impressions = ? where id = ?', [$ad->imp + 1, $ad->id]);
        }

        $data = array(
            'products' => $products,
            'ads' => $ads
        );
        return view('frontend.home')->with($data);
    }

    public function product($name)
    {
        if(Auth::user())
        {
            $product = Product::where('name', '=', $name)->first();
            $ALREADY_ADDED = DB::select('select id from shopping_cart where customer_profile_id = ? and product_id = ?', [Auth::user()->id, $product->id]);

            if($ALREADY_ADDED == null)
            {
                $product_is_in_cart = false;
            }
            else
            {
                $product_is_in_cart = true;
            }

            $data = array(
                'product_is_in_cart' => $product_is_in_cart,
                'product' => $product
            );
            return view('frontend.product-detail')->with($data);
        }
        else
        {
            return redirect()->back()->with('PleaseLogin', 'Please Login to check the details of the product');
        }
    }
//    public function filter()
//    {
//        $data = DB::table('products');
//        if()
//    }
}
