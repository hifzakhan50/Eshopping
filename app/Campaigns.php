<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    protected $guarded=[];
    public function sellerProfile(){
        return $this-> belongsTo('App\SellerProfile');
    }
}
