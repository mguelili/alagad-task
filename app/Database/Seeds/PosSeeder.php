<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class PosSeeder extends Seeder
{
    public function run(){
        $now=date('Y-m-d H:i:s');
        $this->db->table('users')->insert(['username'=>'admin','full_name'=>'System Administrator','password'=>password_hash('password',PASSWORD_DEFAULT),'created_at'=>$now]);
        $this->db->table('products')->insertBatch([['name'=>'Notebook','price'=>45.00,'stock_quantity'=>50,'created_at'=>$now],['name'=>'Ballpen','price'=>15.00,'stock_quantity'=>100,'created_at'=>$now],['name'=>'USB Cable','price'=>120.00,'stock_quantity'=>20,'created_at'=>$now]]);
        $this->db->table('customers')->insertBatch([['full_name'=>'Ana Santos','email'=>'ana@example.com','phone'=>'09171234567','created_at'=>$now],['full_name'=>'Mark Reyes','email'=>'mark@example.com','phone'=>'09181234567','created_at'=>$now]]);
    }
}
