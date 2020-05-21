<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function create(){
        return view('seller.product.create');
    }
    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'category-id' => 'required',
            'color' => 'required',
            'size' => 'required',
        ]);

        $product= auth()->user()->sellerProfile->products()->create([
            'name' => $data['name'],
            'category_id'=>$data['category-id'],
            'color'=>$data['color'],
            'size'=>$data['size'],
            'sku'=>'sku',
            'description'=>'description',
            'price'=>'1234',
            'image'=>'default',
            'quantity'=>'2',
            'weight'=>'7',
        ]);

        return redirect('index');


    }

}
