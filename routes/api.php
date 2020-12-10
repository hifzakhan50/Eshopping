<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('incrementClick/{id}', function ($id) {
    $budget = DB::select('select * from campaigns where id = ?', [$id]);
        //$budget = $budget->Budget;
    $budget = $budget[0]->Budget;
    $budget = $budget - 5;
    if($budget < 5)
    {
        DB::update('update campaigns set clicks = clicks + 1, Budget = ?, is_active = 0 where id = ?', [$budget, $id]);
    }
    else{
        DB::update('update campaigns set clicks = clicks + 1, Budget = ? where id = ?', [$budget, $id]);
    }
});
