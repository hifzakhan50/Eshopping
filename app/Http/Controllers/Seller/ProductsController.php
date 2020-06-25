<?php

namespace App\Http\Controllers\Seller;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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


    public function data()
    {

        $products = DB::table('products')
            ->select(['id', 'name', 'description', 'sku','image','color']);

        return Datatables::of($products)
            ->addColumn('action', function ($products) {

                $editBtn = '<a href="products/' . $products->id . '/edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>';
                $suspendBtn = '<a href="products/' . $products->id . '/suspend" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Suspend</a>';
                $activeBtn = '<a href="products/' . $products->id . '/active" class="btn btn-sm btn-success"><i class="fa fa-ticket"></i> Activate</a>';

//                if($products->is_active)
//                    return $editBtn.' '.$suspendBtn;
//                else
//                    return $editBtn.' '.$activeBtn;
            })
            ->editColumn('image', function($products){
                $imagePath = asset('/storage/'.$products->image);
                return '<img src="'.$imagePath.'" class="w-25">';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

}
