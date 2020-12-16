<?php

namespace app\Http\Controllers\Seller;


use App\Campaigns;
use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database;

class CampaignsController extends Controller
{
    public function fetch(Request $request)
    {
        //IDR
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = DB::table("category")
                    ->where($select, $value)
                    ->groupBy($dependent)
                    -> get();
        alert(here);
        $output = '<option value="">Select' .ucfirst($dependent).'</option>';
        foreach ($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
            }
        echo $output;
    }
    public function index(){
        $list = DB::table('Category', '')
                ->groupBy('name')->get();
    }

    public function create()
    {
        $categorys = DB::table('Category')
            ->get();
        //dd($categorys);
        $products = DB::table('products')
            ->get();
        return view('seller.adMan.create')->with('categorys', $categorys)->with('products',$products);
        //, compact('categorys'));
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'budget' => 'required',
            'seller_id' =>  'required',
            'start-date' => 'required',
            'end-date' => 'required',
        ]);
//dd($data);
        $cam = Campaigns::create([
            'name' => $data['name'],
            'budget' => $data['budget'],
            'start-date' => $data['start-date'],
            'end-date' => $data['end-date'],
        ]);
        dd($cam);
        return redirect()->back()->with('Success', 'Campaign has been created Successfully');
    }

    public function edit($id)
    {
        $cam = Campaigns::find($id);

        return view('seller.adMan.edit', compact('cam'));
    }

    public function update($id)
    {
        $data = request()->validate([
            'name' => 'required',
            'budget' => 'required',
            'start-date' => 'required',
            'end-date' => 'required',
        ]);
        $cat=Category::find($id);
        $cat->update([
            'name' => $data['name'],
            'budget' => $data['budget'],
            'start-date' => $data['start-date'],
            'end-date' => $data['end-date'],
        ]);
        return redirect('/seller')->with('success', 'Campaign has been updated Successfully');;
    }

    public function all()
    {
        return view('seller.adMan.all');
    }
    public function data()
    {
        $methods = DB::table('campaigns')
            ->select(['id', 'seller_profile_id', 'name','Starting Date','Ending Date','Budget', 'is_active']);

        return Datatables::of($methods) ->addColumn('action', function ($method) {

            $editURL = url('admin/shipping-method/'.$method->id.'/edit');
            $suspendURL = url('admin/shipping-method/'.$method->id.'/suspend');
            $active = url('admin/shipping-method/'.$method->id.'/active');


            $editBtn = '<a href="'.$editURL.'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>';
            $suspendBtn = '<a href="'.$suspendURL.'" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Suspend</a>';
            $activeBtn = '<a href="'.$active.' class="btn btn-sm btn-success"><i class="fa fa-ticket"></i> Activate</a>';

            if($method->is_active)
                return $editBtn.' '.$suspendBtn;
            else
                return $editBtn.' '.$activeBtn;
        })
            ->make(true);
    }

    public function active($id)
    {
        $method = Campaigns::find($id);
        $method->update(['is_active' => 1]);

        return redirect()->back()->with('success', 'Campaign has been activated.');
    }

    public function suspend($id)
    {
        $method = Campaigns::find($id)->delete();

        return redirect()->back()->with('success', 'Campaign has been suspended.');
    }

}
