<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart'; // Nama tabel untuk menyimpan data keranjang
    protected $primaryKey = 'id'; // Nama kolom primary key
    protected $allowedFields = ['product_id', 'quantity', 'price']; // Kolom yang diizinkan untuk diisi

    // Metode untuk menambahkan item ke keranjang
    public function addToCart($product_id, $quantity, $price)
    {
        $cartData = [
            'product_id' => $product_id,
            'quantity' => $quantity,
            'price' => $price
        ];

        return $this->insert($cartData);
    }

   
}
