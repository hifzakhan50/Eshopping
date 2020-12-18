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

//            $editURL = url('admin/category/'.$category->id.'/edit');
            $suspendURL = url('admin/category/'.$category->id.'/suspend');


//            $editBtn = '<a href="'.$editURL.'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>';
            $suspendBtn = '<a href="'.$suspendURL.'" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Suspend</a>';
//            $activeBtn = '<a href="'.$active.' class="btn btn-sm btn-success"><i class="fa fa-ticket"></i> Activate</a>';

                return $suspendBtn;
        })
            ->make(true);
    }

    public function suspend($id)
    {
        //dd($id);
        $cat= Order::find($id)->delete();

        return redirect()->back()->with('success', 'Order has been suspended.');
    }
}
