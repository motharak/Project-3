<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Models\CategoryModel;


class CategoryController extends Controller{

    
    public function index(){
        $categoryModel = new CategoryModel;
        $categories = $categoryModel->getCategory();
        
    return view("category",[
        'categories'=> $categories
    ]);
    }
}
?>