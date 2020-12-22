<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\SellerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
//    public function edit($id)
//    {
//      $profile= SellerProfile::find($id);
////      where('user_id', '=', auth()->id())->first();//querry thik krain
//        //dd($profile);
//                return view('seller.profile.edit',compact('profile'));
//    }
//    public function update(Request $request)
//    {
//       /* $name = $request->input('name');
//        $address = $request->input('adress');
//        $about = $request->input('about');
//        $country = $request->input('country');
//        if ($request()->has('image')){
//            $imagePath = request('image')->store('uploads', 'public');
//            $image = $imagePath;
//
//            DB::update('update seller_profile set votes = 100 where name = ?', ['John']);//image b update krain
//        }
//
//        else{
//        DB::update('update seller_profile set votes = 100 where name = ?', ['John']);//without image
//        }*/
//
//        return redirect('/seller')->with('success', 'Profile updated successfully.');
//    }

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
            //$imagePath = request('image')->store('uploads', 'public');
            $imagePath = Storage::disk('public')->putFile('storage/uploads', request('image'));
            auth()->user()->sellerProfile->update(['image' => $imagePath]);

        }
        auth()->user()->sellerProfile->update([
            'name' => $data['name'],
            'address' => $data['adress'],
            'country' => $data['country'],
            'about' => $data['about'],
        ]);

        DB::update('update users set name = ? where id = ?', [$data['name'], Auth::user()->id]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

}
