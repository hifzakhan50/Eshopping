<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $guarded = [];  
}
