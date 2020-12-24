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

    public function store(Request $request)
    {
        $imagePath = request('image')->store('uploads', 'public');
        DB::insert('insert into ful_nets 
        (inv_no, image) 
        values (?, ?)', 
        [$request['Invoice_No'], $imagePath]);

        return redirect()->back()->with('success', 'Request has been created Successfully');
    }


    public function all()
    {

        return view('fulNet.requestManagement.all');
    }

    public function data()
    {
        $fulnet = DB::table('ful_nets')
            ->select(['id', 'inv_no', 'image', 'is_active']);

        return Datatables::of( $fulnet) ->addColumn('action', function ( $fulnet) {
            
         })->editColumn('image', function ($products) {
            $imagePath = asset('/storage/' . $products->image);
            return '<img src="' . $imagePath . '" class="w-25">';
        })
        ->rawColumns(['image', 'action'])
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
