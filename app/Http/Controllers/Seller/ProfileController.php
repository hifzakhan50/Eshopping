<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\SellerProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Facades\DB;

class ProfileController extends Controller
{
    public function edit()
    {
      $profile= SellerProfile::where('user_id', '=', auth()->id())->first();//querry thik krain
        //dd($profile);
                return view('seller.profile.edit',compact('profile'));
    }
    public function update(Request $request)
    {
       /* $name = $request->input('name');
        $address = $request->input('adress');
        $about = $request->input('about');
        $country = $request->input('country');
        if ($request()->has('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = $imagePath;

            DB::update('update seller_profile set votes = 100 where name = ?', ['John']);//image b update krain
        }

        else{
        DB::update('update seller_profile set votes = 100 where name = ?', ['John']);//without image
        }*/

        return redirect('/seller')->with('success', 'Profile updated successfully.');
    }
}
