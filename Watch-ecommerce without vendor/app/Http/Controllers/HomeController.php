<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class HomeController extends Controller
{
    private $proObj;
    private $proObj1;
    private $proObj2;
    private $categoryObj;
    private $categoryObj1;

    public function __construct()
    {
        $this->proObj = new ProductModel();
        $this->proObj1 = new ProductModel();
        $this->proObj2 = new ProductModel();
    }

    public function index()
    {
        $products = $this->proObj->getProduct();
        $categoryObj = $this->proObj1->getProductByCategory('Men watch');
        $categoryObj1 = $this->proObj2->getProductByCategory('Women Watch');
        
        return view("home", ['products' => $products, 'categoryObj' => $categoryObj, 'categoryObj1' => $categoryObj1]);
    }
}
