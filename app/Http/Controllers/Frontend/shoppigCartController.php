<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class shoppigCartController extends Controller
{
    public function store()
    {
        dd(request()->all());
        $data = request()->validate([
            'quantity' => 'required',
            'product_id' => 'required',
        ]);}

    public function addToCart(){
        echo 'testing';
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
