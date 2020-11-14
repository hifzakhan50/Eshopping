<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /*public function hasAnyRoles($roles)  //for dealing user having multiple roles
    {
        return null !== $this->roles()->whereIn('tbl_roles.id', $roles)->first();
    }  */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        //return $this->belongsToMany('App\Role');
        return $this->belongsToMany('App\Role', 'role_user', 'role_id', 'user_id');
    }

    public function hasAnyRole($role) //has one role assigned to one user
    {
        return null !== $this->roles()->where('roles.id', $role)->first();
    }

    public function sellerProfile(){
        return $this->hasOne('App\SellerProfile');
    }

    public function customerProfile(){
        return $this->hasOne('App\CustomerProfile');
    }

    public function fulNetProfile(){
        return $this->hasOne('App\fulNetProfile');
    }
}
