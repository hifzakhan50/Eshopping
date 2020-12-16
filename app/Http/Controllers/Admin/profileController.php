<?php

namespace App\Http\Controllers\Admin;

use App\AdminProfile;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class profileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd('here');
        $profile =  AdminProfile::find($id);
       // $info = User::find($name);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update()
    {
        $data = request()->validate([
            'name' => 'required',
            'image' => ['image'],
        ]);
        if (request()->has('image')){
            $imagePath = request('image')->store('uploads', 'public');
            auth()->user()->adminProfile->update(['image' => $imagePath]);

        }
        auth()->user()->adminProfile->update([
            'name' => $data['name'],
        ]);
        return redirect('/admin')->with('success', 'Profile updated successfully.');
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
