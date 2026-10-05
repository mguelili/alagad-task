<?php
namespace App\Controllers;
use App\Models\CustomerModel;
class Customers extends BaseController
{
    protected CustomerModel $model; public function __construct(){ $this->model=new CustomerModel(); }
    public function index(){ return view('customers/index',['title'=>'Customers','customers'=>$this->model->findAll()]); }
    public function new(){ return view('customers/form',['title'=>'Add Customer','customer'=>null]); }
    public function create(){ return $this->save(); }
    public function edit($id){ return view('customers/form',['title'=>'Edit Customer','customer'=>$this->model->find($id)]); }
    public function update($id){ return $this->save($id); }
    private function save($id=null){ if(!$this->validate(['full_name'=>'required|max_length[100]','email'=>'required|valid_email','phone'=>'permit_empty|max_length[20]'])) return redirect()->back()->withInput()->with('errors',$this->validator->getErrors()); $data=$this->request->getPost(['full_name','email','phone']); $id?$this->model->update($id,$data):$this->model->insert($data); return redirect()->to('/customers')->with('success','Customer saved.'); }
    public function delete($id){ $this->model->delete($id); return redirect()->to('/customers')->with('success','Customer deleted.'); }
}
