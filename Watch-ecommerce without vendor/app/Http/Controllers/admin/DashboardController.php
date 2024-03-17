<?php

namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;
use App\Models\OrderModel;


class DashboardController extends Controller{

    public function index(){
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
    
    $order = new OrderModel();
    $orders = $order->getOrder();
    return view("admin/dashboard",['orders'=>$orders]);
    }

}
?>