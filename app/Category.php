<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $fillable= ['name','description','image'];
    protected $dates= ['created_at','updated_at'];

    public function adminProfile(){
        return $this-> belongsTo('App\AdminProfile');
    }
    protected $guarded=[];

}
