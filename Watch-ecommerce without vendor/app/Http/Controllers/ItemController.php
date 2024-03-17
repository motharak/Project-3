<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;


class ItemController extends Controller{
    public function index(){
    return view("item");
    }
}
?>