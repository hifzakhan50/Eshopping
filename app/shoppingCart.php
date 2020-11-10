<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shoppingCart extends Model
{
    public $table = "shopping_cart";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'customer_profile_id',
        'quantity',
    ];
   /* public function customer_cart()
    {
        return $this->belongsTo('App\User');
    }*///end function
    public function shoppingCart_products()
    {
        return $this->hasOne('App\Product','id');
        //return $this->belongsTo('App\Product');

    }
}
