<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    protected $guarded=[];
    protected $fillable= ['name','budget','is_active','suspend'];
    protected $dates= ['created_at','updated_at','start-date', 'end-date'];

    public function sellerProfile(){
        return $this-> belongsTo('App\SellerProfile');
    }
    public function Campaigns_keyword()
    {
        return $this->hasMany('App\Campaign_keyword');
    }
}
