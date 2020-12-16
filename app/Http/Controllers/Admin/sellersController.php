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
        return view('admin.displayData.seller');
    }


    public function data($id)
    {
        $sel= Role::find($id = '3');
        dd($sel);
        if ($sel) {
            $slist = DB::table('users')
                ->select(['id', 'name', 'email']);
//        , 'seller-id'

            return Datatables::of($slist)->addColumn('action', function ($s) {

                $suspendURL = url('admin/displayData' . $s->id . '/suspend');


//            $editBtn = '<a href="'.$editURL.'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>';
                $suspendBtn = '<a href="' . $suspendURL . '" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Suspend</a>';
//            $activeBtn = '<a href="'.$active.' class="btn btn-sm btn-success"><i class="fa fa-ticket"></i> Activate</a>';

            })
                ->make(true);
        }
        else
            { echo "Oops no data";}

    }
    public function suspend($id)
    {
        //dd($id);
        $slist =User::find($id)->delete();
        return redirect()->back()->with('success', 'User has been suspended.');
    }
}
