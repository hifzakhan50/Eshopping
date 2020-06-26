<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\SellerProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
      $profile= SellerProfile::where('user_id', '=', auth()->id())->first();

        return view('seller.profile.edit',compact('profile'));
    }
    public function update()
    {
        $data = request()->validate([
            'name' => 'required',
            'adress' => 'required',
            'about' => 'required',
            'country' => 'required',
        ]);
        if (request()->has('image')){
            $imagePath = request('image')->store('uploads', 'public');
            auth()->user()->sellerProfile->update(['image' => $imagePath]);

        }
        auth()->user()->sellerProfile->update([
            'name' => $data['name'],
            'address' => $data['adress'],
            'country' => $data['country'],
            'about' => $data['about'],
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
