<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', '1')->get();

        $ads = DB::table('campaigns')->join('products', 'campaigns.Products', '=', 'products.id')->select(
            'campaigns.id as id',
            'products.name as name',
            'products.price as price',
            'products.size as size',
            'products.color as color',
            'campaigns.impressions as imp',
            'products.image as image',
            'campaigns.is_active'
        )->where('campaigns.is_active', 1)->inRandomOrder()->limit(3)->get();
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
        $product = Product::where('name', '=', $name)->first();

        return view('frontend.product-detail', compact('product'));
    }
}
