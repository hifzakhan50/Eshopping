<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', '1')->get();

        return view('frontend.home', compact('products'));
    }

    public function product($name)
    {
        $product = Product::where('name', '=', $name)->first();

        return view('frontend.product-detail', compact('product'));
    }
}
