<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
class ProductModel {

    public function getProduct(){
        $products = DB::table('products')->orderBy('proId','desc')->get();
        return $products;
    }

        
    public function getProductByCategory($category){
        $products = DB::table('products')
                        ->join('caterories', 'products.CategoryNo', '=', 'caterories.CategoryNo')
                        ->select('products.*', 'caterories.categoryName')
                        ->where('caterories.categoryName', $category)
                        ->orderBy('proId','desc')
                        ->get();
        return $products;
    }
// Assuming the correct column name is 'categoryNo' in both tables




    public function addProduct($data)
    {
        return DB::table("products")->insert($data);
    }
    public function findProductById($id){
        return DB::table("products")->where('proId',$id)->first();
    }
    public function getProductByCategoryNo($category)
{
    $result = DB::table('products')
        ->join('caterories', 'products.CategoryNo', '=', 'caterories.CategoryNo')
        ->select('products.*', 'caterories.categoryName')
        ->where('caterories.categoryName', $category)
        ->orderBy('proId', 'desc')
        ->get();

    return $result ?: [];
}

    
    public function updateProduct($id,$data){
        return DB::table('products')->where('proId',$id)->update($data);
    }

    public function deleteProduct($id)
    {
        return DB::table('products')->where('ProId', $id)->delete();
    }
}



?>