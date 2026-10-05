<?php
namespace App\Controllers;
use App\Models\ProductModel;
class Products extends BaseController
{
    protected ProductModel $model;
    public function __construct(){ $this->model=new ProductModel(); }
    public function index(){ return view('products/index',['title'=>'Products','products'=>$this->model->orderBy('id','DESC')->findAll()]); }
    public function new(){ return view('products/form',['title'=>'Add Product','product'=>null]); }
    public function create(){
        $rules=['name'=>'required|max_length[100]','price'=>'required|decimal','stock_quantity'=>'required|is_natural'];
        if(!$this->validate($rules)) return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        $file=$this->request->getFile('image'); $image=null;
        if($file && $file->isValid() && !$file->hasMoved()){ if(!in_array($file->getMimeType(),['image/jpeg','image/png','image/webp'])) return redirect()->back()->withInput()->with('error','Only JPG, PNG, or WEBP images are allowed.'); $image=$file->getRandomName(); $file->move(FCPATH.'uploads/products',$image); }
        $this->model->insert(['name'=>$this->request->getPost('name'),'price'=>$this->request->getPost('price'),'stock_quantity'=>$this->request->getPost('stock_quantity'),'image'=>$image]);
        return redirect()->to('/products')->with('success','Product added.');
    }
    public function edit($id){ return view('products/form',['title'=>'Edit Product','product'=>$this->model->find($id)]); }
    public function update($id){
        if(!$this->validate(['name'=>'required|max_length[100]','price'=>'required|decimal','stock_quantity'=>'required|is_natural'])) return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        $product=$this->model->find($id); $image=$product['image']??null; $file=$this->request->getFile('image');
        if($file && $file->isValid() && !$file->hasMoved()){ $image=$file->getRandomName(); $file->move(FCPATH.'uploads/products',$image); }
        $this->model->update($id,['name'=>$this->request->getPost('name'),'price'=>$this->request->getPost('price'),'stock_quantity'=>$this->request->getPost('stock_quantity'),'image'=>$image]); return redirect()->to('/products')->with('success','Product updated.');
    }
    public function delete($id){ $this->model->delete($id); return redirect()->to('/products')->with('success','Product deleted.'); }
}
