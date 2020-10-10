<?php

namespace App\Http\Controllers\Frontend\testController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testing extends Controller
{
    public function test(){
        echo 'testing';
        exit;
    }

}
