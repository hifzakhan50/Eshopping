<?php

namespace App\Http\Controllers\customer;

use App\CustomerProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $profile= CustomerProfile::where('user_id', '=', auth()->id())->first();

        return view('customer.profile.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'name' => 'required',
            'adress' => 'required',
            'about' => 'required',
            'country' => 'required',
        ]);
        if (request()->has('image')){
            $imagePath = request('image')->store('uploads', 'public');
            auth()->user()->customerProfile->update(['image' => $imagePath]);

        }
        auth()->user()->customerProfile->update([
            'name' => $data['name'],
            'address' => $data['adress'],
            'country' => $data['country'],
            'about' => $data['about'],
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
