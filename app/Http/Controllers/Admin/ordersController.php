<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    //
    public function index()
    {
        $data = Order::all();
        return view('category.all',compact(data));

    }
    public function all()
    {
        //dd('here');
        return view('admin.displayData.allOrders');
    }
    public function data()
    {
        $categories = DB::table('orders')
            ->select(['order_id', '', 'description', 'is_active']);

        return Datatables::of($categories) ->addColumn('action', function ($category) {

            $editURL = url('admin/category/'.$category->id.'/edit');
            $suspendURL = url('admin/category/'.$category->id.'/suspend');
            $active = url('admin/category/'.$category->id.'/active');


            $editBtn = '<a href="'.$editURL.'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>';
            $suspendBtn = '<a href="'.$suspendURL.'" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Suspend</a>';
            $activeBtn = '<a href="'.$active.' class="btn btn-sm btn-success"><i class="fa fa-ticket"></i> Activate</a>';

            if($category->is_active)
                return $editBtn.' '.$suspendBtn;
            else
                return $editBtn.' '.$activeBtn;
        })
            ->make(true);
    }

    public function active($id)
    {
        $cat = Category::find($id);
        $cat->update(['is_active' => 1]);

        return redirect()->back()->with('success', 'Product has been activated.');
    }

    public function suspend($id)
    {
        //dd($id);
        $cat= Category::find($id);
        $cat->update(['is_active' => 0]);
        //dd($cat);

        return redirect()->back()->with('success', 'Product has been suspended.');
    }
}
