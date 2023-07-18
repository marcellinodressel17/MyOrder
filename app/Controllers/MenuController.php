<?php

namespace App\Controllers;

use App\Models\ProductModel;

class MenuController extends BaseController
{
    public function item()
    {
        $data = [];

        // Mengambil daftar produk dari database
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();

        // Mengambil jumlah item dalam keranjang
        $data['cartCount'] = count(session('cart') ?? []);

        helper('url'); // Memuat helper URL

        return view('myorder', $data);
    }

    public function addToCart($productId)
    {
        // Dapatkan data produk berdasarkan ID dari database
        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        if ($product === null) {
            // Produk tidak ditemukan
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        // Tambahkan produk ke keranjang belanja
        $cart = session('cart', []);
        $cartItem = $this->getCartItem($productId, $cart);

        if ($cartItem !== null) {
            // Produk sudah ada dalam keranjang, update jumlahnya
            $cartItem['quantity'] += 1;
        } else {
            // Produk belum ada dalam keranjang, tambahkan sebagai item baru
            $cartItem = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1
            ];
            $cart[] = $cartItem;
        }

        // Simpan keranjang belanja ke dalam session
        session()->set('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    private function getCartItem($productId, $cart)
    {
        if (!is_countable($cart)) {
            $cart = [];
        }

        foreach ($cart as $item) {
            if ($item['id'] === $productId) {
                return $item;
            }
        }
        return null;
    }
}
