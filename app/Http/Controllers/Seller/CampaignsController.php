<?php

namespace App\Http\Controllers\seller;

use App\Campaigns;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{
    public function create()
    {
        return view('seller.adMan.create');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'budget' => 'required',
            'start-date' => 'required',
            'end-date' => 'required',
        ]);

        $cam = Campaigns::create([
            'name' => $data['name'],
            'budget' => $data['budget'],
            'start-date' => $data['start-date'],
            'end-date' => $data['end-date'],
        ]);

        return redirect()->back()->with('Success', 'Campaign has been created Successfully');
    }

}
