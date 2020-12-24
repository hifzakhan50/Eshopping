<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DynamicPDFController extends Controller
{
function index(){
    $Total_sales_tax= $this->get_salestax_data();
    return view('frontend.Reports.salestax')->with('Total_sales_tax',$Total_sales_tax);
}
function get_salestax_data(){

    $Total_sales_tax= DB::table('orders')
                        ->get();
    return $Total_sales_tax; 
}
function all_users(){
   $Total_users_registered= $this->get_users_data();
     return view('frontend.Reports.all_usersreport')->with('Totat_users_registered',$Total_users_registered);

 }
 function get_users_data(){
    $Total_users_registered=DB::table('users')
                           ->get();
     return  $Total_users_registered;
 }

public function get_all_users(){

    $get_users = DB::table('users')
    ->select()
    ->where('users.name', '!=', 'Admin')
    ->get();
        
    return Datatables::of($get_users)
        ->addColumn('action', function ($get_users) {
        })
        ->make(true);
}

public function salestax() {
    $activeorders = DB::table('orders')
        ->select()
        ->get();
            
        return Datatables::of($activeorders)
            ->addColumn('action', function ($activeorders) {
            })
            ->make(true);
    }

    function Inventory(){
        $Total_products_Added= $this->get_products_data();
          return view('frontend.Reports.Inventory')->with('Totat_products_Added', $Total_products_Added);
     
      }
      function get_products_data(){
        $Total_products_Added=DB::table('products')
                                ->get();
          return   $Total_products_Added;
      }
     
     public function get_all_products(){
     
         $get_products = DB::table('products')
         ->select()
         ->get();
             
         return Datatables::of($get_products)
             ->addColumn('action', function ($get_products) {
             })
             ->make(true);
}
function delivered_orders(){
    $Total_delivered_orders= $this->get_delivered_orders_data();
      return view('frontend.Reports.Delivered')->with(' $Total_delivered_orders',  $Total_delivered_orders);
 
  }
  function get_delivered_orders_data(){
    $Total_delivered_orders=DB::table('orders')
                            ->get();
      return $Total_delivered_orders;
  }
 
 public function get_all_delivered_orders(){
 
     $get_products = DB::table('orders')
     ->select()
     ->where('orders.status', '=', 'Delivered')
     ->get();
         
     return Datatables::of($get_products)
         ->addColumn('action', function ($get_products) {
         })
         ->make(true);
}

function suspended_orders(){
    $Total_suspended_orders= $this->get_suspended_orders_data();
      return view('frontend.Reports.Suspended-orders-report')->with(' $Total_suspended_orders',   $Total_suspended_orders);
 
  }
  function get_suspended_orders_data(){
    $Total_suspended_orders=DB::table('orders')
                            ->get();
      return $Total_suspended_orders;
  }
 
 public function get_all_suspended_orders(){
 
     $get_suspended = DB::table('orders')
     ->select()
     ->where('orders.status', '=', 'Suspended')
     ->get();
         
     return Datatables::of($get_suspended)
         ->addColumn('action', function ($get_suspended) {
         })
         ->make(true);
}
}