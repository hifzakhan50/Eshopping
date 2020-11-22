<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    public function user(){
    return $this->belongsTo('App\User');
}

    public function category(){
        return $this->hasMany('App\Category');
    }

    public function shippingMethod(){
        return $this->hasMany('App\ShipMan');
    }

    protected $guarded=[];
}
