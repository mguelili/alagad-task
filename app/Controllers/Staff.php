<?php
namespace App\Controllers;
use App\Models\UserModel;
class Staff extends BaseController
{
    protected UserModel $model; public function __construct(){ $this->model=new UserModel(); }
    public function index(){ return view('staff/index',['title'=>'Staff','staff'=>$this->model->findAll()]); }
    public function new(){ return view('staff/form',['title'=>'Add Staff','staffMember'=>null]); }
    public function create(){ return $this->save(); }
    public function edit($id){ return view('staff/form',['title'=>'Edit Staff','staffMember'=>$this->model->find($id)]); }
    public function update($id){ return $this->save($id); }
    private function save($id=null){
        $rules=['username'=>'required|max_length[50]','full_name'=>'required|max_length[100]']; if(!$id)$rules['password']='required|min_length[6]';
        if(!$this->validate($rules)) return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        $data=$this->request->getPost(['username','full_name']); $password=$this->request->getPost('password'); if($password)$data['password']=password_hash($password,PASSWORD_DEFAULT);
        $file=$this->request->getFile('avatar'); if($file && $file->isValid() && !$file->hasMoved()){ $data['avatar']=$file->getRandomName(); $file->move(FCPATH.'uploads/avatars',$data['avatar']); }
        $id?$this->model->update($id,$data):$this->model->insert($data); return redirect()->to('/staff')->with('success','Staff member saved.');
    }
    public function delete($id){ if((int)$id===(int)session('user_id')) return redirect()->to('/staff')->with('error','You cannot delete your own account.'); $this->model->delete($id); return redirect()->to('/staff')->with('success','Staff member deleted.'); }
}
