<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order'; // Nama tabel pesanan dalam database
    protected $primaryKey = 'id'; // Primary key tabel pesanan

    protected $allowedFields = [
        'menu_name', 'quantity', 'total_price','customer_name','table_number','validated' // Kolom yang diizinkan untuk diisi
    ];

    public function insertOrderDetail($data)
    {
        return $this->insert($data);
    }
    public function getMenuSales()
{
    $orderModel = new OrderModel();

    $menuSales = $orderModel->select('menu_name, SUM(quantity) as total_sales, SUM(total_price) as total_revenue')
        ->groupBy('menu_name')
        ->findAll();

    return $menuSales;
}

}



