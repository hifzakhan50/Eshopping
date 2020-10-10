<?php

namespace App\Http\Controllers\Frontend\Orders;

use App\Http\Controllers\Controller;

class order extends Controller
{
    public function store()
    {

       // dd(request()->all());

        $data = request()->validate([
            'full-name' => 'required',
            'email' => ['required', 'email'],
            'mnumber' => 'required',
            'house-number' => 'required',
            'street' => 'required',
            'province' => 'required',
            'postalcode' => 'required',
            'city' => 'required',
            'addresstype'=>'required'
        ]);

    }

    }
