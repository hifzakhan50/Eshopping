<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{ protected $guarded = [];

    public function orderDetail()
    {
        return $this->belongsTo('App\Models\OrderDetail');
    }
}
