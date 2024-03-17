<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class CategoryModel {
    public function getCategory(){
        $categories = DB::table('caterories')->orderBy('categoryNo','desc')->get();
        return $categories;
    }
    public function getCategories()
    {
        $categories = DB::table("caterories")->orderBy('categoryNo', 'desc')->get();
        return $categories;
    }
    public function addCategory($data)
    {
        return DB::table("caterories")->insert($data);
    }
    public function findCategoryById($id){
        return DB::table("caterories")->where('categoryNo',$id)->first();
    }
    public function updateCategory($id,$data){
        return DB::table('caterories')->where('categoryNo',$id)->update($data);
    }
    public function deleteCategory($id)
    {
        return DB::table('caterories')->where('categoryNo', $id)->delete();
    }
}



?>