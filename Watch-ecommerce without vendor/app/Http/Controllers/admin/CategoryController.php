<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    private $categoryObj;
    public function __construct()
    {
        $this->categoryObj = new CategoryModel();
    }

    public function index()
    {
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
        $cateogries = $this->categoryObj->getCategories();
        return view(".admin.Category.index", ['categories' => $cateogries]);
    }

    public function add()
    {
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategories();
        return view('.admin.Category.add', ['categories' => $categories]);
    }
    public function addAction(Request $request)
    {
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
        elseif(session('username')=='demo@fake.com'){
            session()->flash('demo', 'only view not allow to add.');
            return redirect('/admin/category');
        }
        $txtTitle = $request->input('name');
        $txtDescription = $request->input('description');
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);
        $data = [
            'categoryName' => $txtTitle,
            'Desription' => $txtDescription,
            'Picture' => $fileName,
            
        ];
        $productModel = new CategoryModel();
        $productModel->addCategory($data);
        return redirect('/admin/category');
    }
    public function edit($id){
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
        $category = $this->categoryObj->findCategoryById($id);
        return view('admin.Category.edit', ['category'=> $category]);
        
    }
    public function updateAction(Request $request){
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }elseif(session('username')=='demo@fake.com'){
            session()->flash('demo', 'only view not allow to edit.');
            return redirect('/admin/category');
        }
        $txtId = $request->input('hiddenId');
        $txtTitle = $request->input('name');
        $txtDescription = $request->input('description');
        
        $data = [
            'categoryName' => $txtTitle,
            'Desription' => $txtDescription,            
        ];
        if (!empty($file)) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $data['Picture'] = $fileName;
        }
        $productModel = new CategoryModel();
        $productModel->updateCategory($txtId,$data);
        return redirect('/admin/category');
    }
    public function delete($id, $picture)
    {
        session_start();
        if (empty(session('username'))) {
            return redirect('/admin/login');
        }
        elseif(session('username')=='demo@fake.com'){
            session()->flash('demo', 'only view not allow to delete.');
            return redirect('/admin/category');
        }
        $productModel = new CategoryModel();
        $productModel->deleteCategory($id);
        @unlink(public_path('uploads\\' . $picture));
        return redirect('/admin/product');
    }
    
   
}
