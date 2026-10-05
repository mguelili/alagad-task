<?php
namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\SaleModel;
class Dashboard extends BaseController
{
    public function index(){ return view('dashboard', ['title'=>'Dashboard','products'=>(new ProductModel())->countAllResults(),'customers'=>(new CustomerModel())->countAllResults(),'sales'=>(new SaleModel())->countAllResults()]); }
}
