<?php

namespace App\Http\Controllers\Frontend\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $data = array(
            'fname' => $request->input('fname'),
            'hname' => $request->input('house-name'),
            'street' => $request->input('steet'),
            'city' => $request->input('city'),
            'province' => $request->input('province'),
            'postalcode' => $request->input('postalcode'),
            'country' => $request->input('country'),
            'mnumber' => $request->input('mnumber'),
        );


        DB::insert('insert into billing_address (fullname, mobile, email, house, street, province, postalcode, country, addresstype1) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [$fname, $mnumber, $email, $hname, $street, $province, $postalcode, $country, $addresstype]);

        return view('frontend.BillingAdress.billing-address')->with('data', $data);
    }

    }
