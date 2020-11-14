<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=[];

    protected $table='category';
    protected $fillable= ['name','description','is_active','suspend'];
    protected $dates= ['created_at','updated_at'];

    public function adminProfile(){
        return $this-> belongsTo('App\AdminProfile');
    }
    public function product()
    {
        return $this-> hasMany('App\Product');
    }

}
