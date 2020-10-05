<?php

namespace App\Http\Controllers\fulNet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class fulNetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fulNetDashboard()
    {
        return view('fulNet.index');
    }

}
