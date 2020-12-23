<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\ShipMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class shipMans extends Controller
{
    public function create()
    {
        return view('admin.shipping-management.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $method = ShipMan::create([
            'name' => $data['name'],
            'price' => $data['price'],
        ]);

        return redirect()->back()->with('success', 'Method has been added Successfully');
    }

    public function index(){

        $list = DB::table('shipping_method')
                        ->groupBy('name')->get();
        return view('product.create')->with('list','$list');
    }
    public function edit($id)
    {
        $method = ShipMan::find($id);
//dd($method);
        return view('admin.shipping-management.edit', compact('method'));
    }

    public function update($id)
    {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $method = ShipMan::find($id);
       $method ->update([
            'name' => $data['name'],
            'price' => $data['price'],
        ]);
        return redirect('index')->with('success', 'Method updated Successfully');

    }

    public function all()
    {
        return view('admin.shipping-management.all');
    }

    public function data()
    {
        $methods = DB::table('shipping_method')
            ->select(['id', 'name', 'price']);

        return Datatables::of($methods) ->addColumn('action', function ($method) {

            $editURL = url('/admin/shipping-management/'.$method->id.'/edit');
            $suspendURL = url('/admin/shipping-management/'.$method->id.'/suspend');
//            $active = url('admin/shipping-method/'.$method->id.'/active');


            $editBtn = '<a href="'.$editURL.'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>';
            $suspendBtn = '<a href="'.$suspendURL.'" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Suspend</a>';
//            $activeBtn = '<a href="'.$active.' class="btn btn-sm btn-success"><i class="fa fa-ticket"></i> Activate</a>';

                return $editBtn.' '.$suspendBtn;
        })
            ->make(true);
    }

    public function suspend($id)
    {
        $method = ShipMan::find($id)->delete();
        return redirect()->back()->with('success', 'Method has been suspended.');
    }

}
