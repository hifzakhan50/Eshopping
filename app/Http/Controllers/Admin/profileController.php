<?php

namespace App\Http\Controllers\Admin;

use App\AdminProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = AdminProfile::where('user_id', '=', auth()->id())->first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update()
    {
        $data = request()->validate([
            'name' => 'required',
            'image' => ['image'],
            'address' => 'required',
            'about' => 'required',
            'country' => 'required',
        ]);
        if (request()->has('image')){
            $imagePath = request('image')->store('uploads', 'public');
            auth()->user()->adminProfile->update(['image' => $imagePath]);

        }
        auth()->user()->adminProfile->update([
            'name' => $data['name'],
            'address' => $data['address'],
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
