<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class productsController extends Controller
{
    public function all()
    {
        dd('here');
        return view('admin.displayData.products');
    }

    public function data()
    {
//        dd('here');
        $aproducts = DB::table('products')
            ->select(['id', 'name', 'description','price', 'sku', 'image', 'color', 'is_active'])->get();

        return Datatables::of($aproducts)
            ->addColumn('action', function ($aproducts) {

                $suspendRoute = route('products.suspend', $aproducts->id);
//                $editRoute = route('products.edit', $products->id);

//                $editBtn = '<a href="' . $editRoute . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>';
                $suspendBtn = '<a href="' . $suspendRoute . '" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Suspend</a>';

                return $suspendBtn;

            })
//            ->editColumn('image', function ($products) {
//                $imagePath = asset('/storage/' . $aproducts->image);
//                return '<img src="' . $imagePath . '" class="w-25">';
//            })
//            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function suspend($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->back()->with('Success', 'Product has been suspended.');
    }
}
