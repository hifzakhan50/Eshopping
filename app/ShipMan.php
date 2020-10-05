<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipMan extends Model
{
    protected $table= 'shipping_method';
    protected $fillable= ['name','price','image']; //column names
    protected $dates= ['created_at','updated_at'];

    public function adminProfile(){
        return $this-> belongsTo('App\AdminProfile');
    }
    protected $guarded=[];

}
