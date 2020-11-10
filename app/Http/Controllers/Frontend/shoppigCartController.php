<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class shoppigCartController extends Controller
{
    public function addToCart(){
        session()->push('products', request()->all());
    }

    public function remove($index)
    {

        $products = session()->pull('products');

        foreach ($products as $key => $product) {
            if ($key != $index)
                session()->push('products', $product);
        }

    }

}
