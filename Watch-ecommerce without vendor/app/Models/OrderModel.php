<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;

class OrderModel
{
    public function getOrder(){
        $order = DB::table('order')->get();
        return $order;
    }
}
