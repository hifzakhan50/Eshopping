<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerProfile extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function products(){
return $this->hasMany('App\Product');
    }
protected $guarded=[];

}
