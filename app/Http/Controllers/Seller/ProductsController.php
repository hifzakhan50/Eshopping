<?php

namespace App\Http\Controllers\Seller;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function create()
    {
        return view('seller.product.create');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('seller.product.edit', compact('product', 'categories'));
    }

    public function store()
    {


        $data = request()->validate([
            'name' => 'required',
            'category-id' => 'required',
            'color' => 'required',
            'size' => 'required',
            'sku' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => ['required', 'image'],
            'quantity' => 'required',
            'weight' => 'required',
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $product = auth()->user()->sellerProfile->products()->create([
            'name' => $data['name'],
            'category_id' => $data['category-id'],
            'color' => $data['color'],
            'size' => $data['size'],
            'sku' => $data['sku'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $imagePath,
            'quantity' => $data['quantity'],
            'weight' => $data['weight'],
        ]);

        return redirect()->back()->with('success', 'Product has been added Successfully');


    }

    public function update($id)
    {

        $data = request()->validate([
            'name' => 'required',
            'category-id' => 'required',
            'color' => 'required',
            'size' => 'required',
            'sku' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => ['image'],
            'quantity' => 'required',
            'weight' => 'required',
        ]);
        $product=Product::find($id);
        if (request()->has('image')){
        $imagePath = request('image')->store('uploads', 'public');
        $product->update(['image' => $imagePath]);

    }
        $product->update([
            'name' => $data['name'],
            'category_id' => $data['category-id'],
            'color' => $data['color'],
            'size' => $data['size'],
            'sku' => $data['sku'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'weight' => $data['weight'],
        ]);
return redirect('index');
    }
    public function all()
    {
        $products = Product::where('seller_profile_id', '=', auth()->user()->sellerProfile->id)->get();
        return view('seller.product.all', compact('products'));
    }
}
