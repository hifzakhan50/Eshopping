<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(auth()->id());
        $role = $user->roles()->orderBy('name')->first();
        //get role of current user [$user->id]
        $current_role = DB::table('role_user')->select(['role_id'])->where('user_id','=',$user->id)->first();
        if($current_role->role_id == 1){
            return view('admin.index');
        }else if($current_role->role_id == 2){
            return view('customer.index');
        }else if($current_role->role_id == 3){
            return view('seller.index');
        }return view('home');
    }
}
