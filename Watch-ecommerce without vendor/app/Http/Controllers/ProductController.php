<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Support\Collection;
class ProductController extends Controller{

    private $proObj;

    public function __construct()
    {
        $this->proObj = new ProductModel();
    }
    public function index(){

    $products = $this->proObj->getProduct();
    return view("product", ['products' => $products]);
    }
    public function productDetail($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->findProductById($id);
        
        return view("item", ['product' => $product]);
    }
    public function productByCategoryNo($categoryName)
    {
        $productModel = new ProductModel();
        $categoryName1 = str_replace('%', ' ', $categoryName);
        $productsByCategory = $productModel->getProductByCategoryNo($categoryName1);
        
        // dd($productsByCategory); // Print the result for debugging purposes
    
        return view('productCategory', ['productsByCategory' => $productsByCategory]);
    }
    
}
?>