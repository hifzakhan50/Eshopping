<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Role;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

  /* protected function authenticated(Request $request, $user)
    {
        $role = Role::find(['role']);
        $user->roles()->attach($role);

        if($user->role->id==1){

            return redirect(('/admin'.$user->id));
        }
        else if($user->role->id==2){

            return redirect(('/customer'.$user->id));
        }
        else if($user->role->id==3){

            return redirect(('/seller'.$user->id));
        }
        else if($user->role->id==4){

            return redirect(('/fulNet'.$user->id));
        }
        return redirect('/HOME');
    }    */

protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   /*protected function authenticated(Request $request, $user)
    {
        if ($user->isRole('admin'))
        {
            return redirect('/admin');
        }
        else if ($user->isRole('seller'))
        {
            return redirect('/seller');
        }
        else
        {
            return redirect('/');
        }
        //return response([

       // ]);
    } */

    protected function redirectTo()
    {
       // return '/seller';
        if(auth()->user()->hasAnyRole(1))
        {
            return '/admin';
        }
        elseif(auth()->user()->hasAnyRole(2))
        {
            return '/customer';
        }
        elseif(auth()->user()->hasAnyRole(3)){
            return '/seller';
//            echo 'seller';
//            exit;
//            return redirect('seller.dashboard');
        }
        elseif(auth()->user()->hasAnyRole(4)){
//            echo 'logincontroller';
//            exit;
            return '/fulNet';
        }
        return '/HOME';
    }
}
