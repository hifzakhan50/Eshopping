<?php

namespace App\Http\Controllers\Frontend\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class order extends Controller
{
    public function store(Request $request)
    {
        $fname = $request->input('fname');
        $mnumber = $request->input('mnumber');
        $email = $request->input('email');
        $hname = $request->input('house-number');
        $street = $request->input('street');
        $city = $request->input('city');
        $province = $request->input('province');
        $postalcode = $request->input('postalcode');
        $country = $request->input('country');
        $addresstype = $request->input('addresstype');

        /*$data = array(
            'fname' => $request->input('fname'),
            'hname' => $request->input('house-name'),
            'street' => $request->input('steet'),
            'city' => $request->input('city'),
            'province' => $request->input('province'),
            'postalcode' => $request->input('postalcode'),
            'country' => $request->input('country'),
            'mnumber' => $request->input('mnumber'),
        );*/

        $user_id = Auth::user()->id;
        DB::insert('insert into billing_address (user_id, fullname, mobile, email, house, street, province, postalcode, country, addresstype1) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$user_id, $fname, $mnumber, $email, $hname, $street, $province, $postalcode, $country, $addresstype]);

        $data = DB::select('select * from billing_address where user_id = ?', [Auth::user()->id]);

        return view('frontend.BillingAdress.billing-address')->with('data', $data);
    }

    }
