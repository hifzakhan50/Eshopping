<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded=[];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
        'sku',
        'description',
        'price',
        'color',
        'weight',
        'quantity',
        'image',
    ];
    public function sellerProfile(){
        return $this-> belongsTo('App\SellerProfile');
    }
    /*public function shoppingCart_products()
    {
        return $this->belongsTo('App\shoppingCart','product_id');
    }*/
    public function cart()
    {
        return $this->belongsTo('App\shoppingCart');
        //return $this->hasOne('App\shoppingCart','product_id');
    }

    public function category()
    {
        return $this-> belongsTo('App\Category');
    }
}
