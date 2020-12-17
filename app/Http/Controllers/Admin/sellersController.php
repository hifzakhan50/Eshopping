<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class sellersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $all_sellers = DB::table('users')
            ->join('role_user', 'role_user.role_id', '=', 'users.id')
            ->select()
            ->where('role_user.user_id', '=', 3)->get();
        //dd($all_customers);
        return view('admin.displayData.seller')->with('sellers', $all_sellers);
    }


    public function data()
    {
        $all_sellers = DB::table('users')
            ->join('role_user', 'role_user.role_id', '=', 'users.id')
            ->select()
            ->where('role_user.user_id', '=', 3)->get();

//        $categories = DB::table('category')
//            ->select(['id', 'name', 'description', 'is_active']);

        return Datatables::of($all_sellers) ->addColumn('action', function ($seller) {

            $editURL = url('admin/seller/'.$seller->id.'/edit');
            $suspendURL = url('admin/seller/'.$seller->id.'/suspend');
            $active = url('admin/seller/'.$seller->id.'/active');


            $editBtn = '<a href="'.$editURL.'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>';
            $suspendBtn = '<a href="'.$suspendURL.'" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Suspend</a>';
//            $activeBtn = '<a href="'.$active.' class="btn btn-sm btn-success"><i class="fa fa-ticket"></i> Activate</a>';


            return $editBtn.' '.$suspendBtn;
        })
            ->make(true);
    }
    public function suspend($id)
    {
        //dd($id);
        DB::table('users')
            ->where('id', $id)
            ->delete();
        //dd($id);
        return redirect()->back()->with('success', 'Seller has been deleted.');
    }
}
