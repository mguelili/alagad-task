<?php
namespace App\Controllers;
use App\Models\SaleModel; use App\Models\ProductModel; use App\Models\CustomerModel;
class Sales extends BaseController
{
    public function new(){ return view('sales/form',['title'=>'Record Sale','products'=>(new ProductModel())->where('stock_quantity >',0)->findAll(),'customers'=>(new CustomerModel())->findAll()]); }
    public function create(){
        $productModel=new ProductModel(); $product=$productModel->find($this->request->getPost('product_id')); $quantity=(int)$this->request->getPost('quantity');
        if(!$product || $quantity<1) return redirect()->back()->withInput()->with('error','Choose a valid product and quantity.');
        if($quantity>$product['stock_quantity']) return redirect()->back()->withInput()->with('error','Sale rejected: requested quantity exceeds available stock.');
        $db=db_connect(); $db->transStart(); $productModel->update($product['id'],['stock_quantity'=>$product['stock_quantity']-$quantity]); (new SaleModel())->insert(['product_id'=>$product['id'],'customer_id'=>$this->request->getPost('customer_id')?:null,'sold_by'=>session('user_id'),'quantity'=>$quantity,'total_price'=>$product['price']*$quantity,'created_at'=>date('Y-m-d H:i:s')]); $db->transComplete();
        return redirect()->to('/sales')->with('success','Sale recorded and stock updated.');
    }
    public function index(){ $sales=(new SaleModel())->select('sales.*, products.name product_name, customers.full_name customer_name, users.full_name staff_name')->join('products','products.id=sales.product_id')->join('customers','customers.id=sales.customer_id','left')->join('users','users.id=sales.sold_by')->orderBy('sales.id','DESC')->findAll(); return view('sales/index',['title'=>'Sales History','sales'=>$sales]); }
}
