<?php

namespace App\Http\Controllers\fulNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class fulNetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fulNetDashboard()
    {
//        echo 'controllerside';
//        exit;
        return view('fulNet.index');
    }

    public function create()
    {
        return view('fulNet.requestManagement.create');
    }

    public function store()
    {
        $data = request()->validate([
            'inv-no' => 'required',
            'image' => ['required', 'image'],
        ]);
        $imagePath = request('image')->store('uploads', 'public');
        $net = FulNet::create([
            'inv-no' => $data['inv-no'],
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Request has been created Successfully');
    }


    public function all()
    {

        return view('fulNet.requestManagement.all');
    }

    public function data()
    {
        $fulnet = DB::table('ful_nets')
            ->select(['id', 'inv-no', 'image', 'is_active']);

        return Datatables::of( $fulnet) ->addColumn('action', function ( $fulnet) {


            $suspendURL = url('fulNet/requestManagement'. $fulnet->id.'/suspend');

            $suspendBtn = '<a href="'.$suspendURL.'" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Suspend</a>';

                return $suspendBtn;
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
        $cat= Category::find($id)->delete();
        //dd($cat);

        return redirect()->back()->with('success', 'Category has been suspended.');
    }

}
