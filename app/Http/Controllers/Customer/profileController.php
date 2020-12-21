<?php

namespace App\Http\Controllers\customer;

 use App\CustomerProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class profileController extends Controller
{

    public function edit()
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
    public function update(Request $data)
    {
        
        // $data = request()->validate([
        //     'name' => 'required',
        //     'address' => 'required',
        //     'about' => 'required',
        //     'city' => 'required',
        // ]);

        if (request()->has('image')){
            $imagePath = request('image')->store('uploads', 'public');
            auth()->user()->customerProfile->update(['image' => $imagePath]);

        }
        auth()->user()->customerProfile->update([
            'name' => $data['name'],
            'address' => $data['address'],
            'country' => $data['country'],
            'city' => $data['city'],
        ]);
        DB::update('update users set name = ? where id = ?', [$data['name'], Auth::user()->id]);
        return redirect()->back()->with('success', 'Customer Profile updated successfully.');
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
