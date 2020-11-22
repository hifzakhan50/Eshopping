<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FulNetProfile extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
}
