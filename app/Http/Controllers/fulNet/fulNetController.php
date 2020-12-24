<?php

namespace App\Http\Controllers\fulNet;

use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
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
            
         })->editColumn('image', function ($fulnet) {
            $imagePath = asset('/storage/' . $fulnet->image);
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

    public function newRequests()
    {
        return view('fulNet.requestManagement.newRequests');
    }

    public function newRequestsAll()
    {
        $fulnet = DB::table('ful_nets')
            ->select(['id', 'inv_no', 'image', 'is_active'])
            ->where('is_active', 'Requested')->get();
            
        return Datatables::of($fulnet)
            ->addColumn('action', function ($fulnet) {

                $AcceptedRoute = route('fulnet.accepted', $fulnet->id);
                $rejectedRoute = route('fulnet.rejected', $fulnet->id);

                //$editBtn = '<a href="' . $editRoute . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>';
                $AcBtn = '<a href="' . $AcceptedRoute . '" class="btn btn-sm btn-success"><i class="fa fa-tick"></i> Accept</a>';
                $RjBtn = '<a href="' . $rejectedRoute . '" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Reject</a>';

                    return $AcBtn . ' ' . $RjBtn;
            })->editColumn('image', function ($fulnet) {
                $imagePath = asset('/storage/' . $fulnet->image);
                return '<img src="' . $imagePath . '" class="w-25">';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function accept($id)
    {
        DB::update('update ful_nets set is_active = ? where id = ?', ['Accepted', $id]);
        return redirect()->back()->with('success', 'Request Marked as Accepted.');
    }

    public function reject($id)
    {
        DB::update('update ful_nets set is_active = ? where id = ?', ['Rejected', $id]);
        return redirect()->back()->with('success', 'Request Marked as Rejected.');
    }

    public function fulfilledrequests()
    {
        return view('fulNet.requestManagement.fulfilledrequests');
    }

    public function fulfilledrequestsget()
    {
        $fulnet = DB::table('ful_nets')
            ->select(['id', 'inv_no', 'image', 'is_active'])
            ->where('is_active', '!=', 'Requested')->get();
        
        return Datatables::of($fulnet)->editColumn('image', function ($fulnet) {
                $imagePath = asset('/storage/' . $fulnet->image);
                return '<img src="' . $imagePath . '" class="w-25">';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }
}
