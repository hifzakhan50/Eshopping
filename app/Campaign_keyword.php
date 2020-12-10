<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign_keyword extends Model
{
    public function Campaigns()
    {
        return $this-> belongsTo('App\Campaigns');
    }
}

