<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Models\CategoryModel;

class ProductController extends Controller
{
    private $productObj;
    private $categoryObj;
    public function __construct()
    {
        $this->productObj = new ProductModel();
        $this->categoryObj = new CategoryModel();
    }

    public function index()
    {

        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }

        $products = $this->productObj->getProduct();
        $cateogries = $this->categoryObj->getCategories();
        return view("admin.Product.index", ['products' => $products],['categories' => $cateogries]);
    }

    public function add()
    {

        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }

        $productModel = new ProductModel();
        $products = $productModel->getProduct();
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategories();
        return view('admin.Product.add', ['products' => $products],['categories' => $categories]);
    }
    public function addAction(Request $request)
    {
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
        elseif(session('username')=='demo@fake.com'){
            session()->flash('demo', 'only view not allow to add.');
            return redirect('/admin/product');
        }

        $txtTitle = $request->input('name');
        $txtPrice = $request->input('price');
        $txtCategory = $request->input('category');
        $txtDescription = $request->input('description');
        $txtQty = $request->input('qty');
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);
        $data = [
            'proName' => $txtTitle,
            'proPrice' => $txtPrice,
            'categoryNo' => $txtCategory,
            'Picture' => $fileName,
            'Description' => $txtDescription,
            'QTY' => $txtQty,
            
        ];
        $productModel = new ProductModel();
        $productModel->addProduct($data);
        return redirect('/admin/product');
    }
    public function edit($id){

        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategories();
        $product = $this->productObj->findProductById($id);
        return view('admin.Product.edit', ['product'=> $product],['categories' => $categories]);
    }
    public function updateAction(Request $request){

        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
        elseif(session('username')=='demo@fake.com'){
            session()->flash('demo', 'only view not allow to edit.');
            return redirect('/admin/product');
        }

        $txtId = $request->input('hiddenId');
        $txtTitle = $request->input('name');
        $txtPrice = $request->input('price');
        $txtCategory = $request->input('category');
        $txtDescription = $request->input('description');
        $txtQty = $request->input('qty');
        $data = [
            'proName' => $txtTitle,
            'proPrice' => $txtPrice,
            'categoryNo' => $txtCategory,
            'Description' => $txtDescription,
            'QTY' => $txtQty,
            
        ];
        if (!empty($file)) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $data['Picture'] = $fileName;
        }
        $productModel = new ProductModel();
        $productModel->updateProduct($txtId,$data);
        return redirect('/admin/product');

    }
    public function delete($id, $picture)
    {
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
        elseif(session('username')=='demo@fake.com'){
            session()->flash('demo', 'only view not allow to delete.');
            return redirect('/admin/product');
        }
        if(!empty(session('username'))){
            $productModel = new ProductModel();
            $productModel->deleteProduct($id);
            @unlink(public_path('uploads\\' . $picture));
            return redirect('/admin/product');
        }
    }
    
   
}
