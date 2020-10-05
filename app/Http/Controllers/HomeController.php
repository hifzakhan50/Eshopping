<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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


        if($role->name == 'Admin'){
            return view('admin.index');
        }
        else if($role->name == 'Customer'){
            return view('customer.index');
        }
        else if($role->name == 'Seller') {
            //dd($role);
            return view('seller.index');
        }
        else if($role->name == 'Fulfillment Net User'){
                return view('fulNet.index');
        }
        return view('home');
    }
}
