<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\CartModel;
use App\Models\MejaModel;

class CartController extends BaseController
{
    protected $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function cart()
    {
        $cartItems = session('cart', []);
    
        // Ambil data meja dari model (asumsikan MejaModel sebagai model untuk data meja)
        $mejaModel = new MejaModel();
        $meja = $mejaModel->findAll();
    
        return view('cart', ['cartItems' => $cartItems, 'meja' => $meja]);
    }
    

    public function processOrder()
{
    if ($this->request->getMethod() === 'post') {
        $orderModel = new OrderModel();

        // Ambil data dari form
        $customerName = $this->request->getPost('name');
        $tableNumber = $this->request->getPost('table_number');

        // Ambil data cartItems dari session
        $cartItems = session('cart', []);

        if (!empty($cartItems)) {
            $totalPrice = 0; // Inisialisasi total harga

            // Lakukan iterasi $cartItems dan simpan data ke dalam tabel orders
            foreach ($cartItems as $cartItem) {
                $menuName = $cartItem['name'];
                $quantity = $cartItem['quantity'];
                $itemPrice = $cartItem['price'];
                $itemTotalPrice = $itemPrice * $quantity; // Hitung harga total per item

                $totalPrice += $itemTotalPrice; // Akumulasi total harga

                // Simpan data ke dalam tabel orders menggunakan OrderModel
                $orderData = [
                    'menu_name' => $menuName,
                    'quantity' => $quantity,
                    'total_price' => $itemTotalPrice, // Simpan harga total per item
                    'customer_name' => $customerName,
                    'table_number' => $tableNumber
                ];

                $result = $orderModel->insertOrderDetail($orderData);

                if (!$result) {
                    log_message('error', 'Gagal menyimpan data pesanan: ' . $orderModel->errors());
                }
            }

            // Hapus keranjang belanja setelah berhasil memproses pesanan
            session()->remove('cart');

            // Tambahkan total harga ke dalam $orderData
            $orderData['total_price'] = $totalPrice;

            // Tampilkan halaman order_success dan kirim $orderData sebagai data
            return view('order_success', $orderData);
        }
    }

    // Jika ada kesalahan atau data cartItems kosong, bisa diarahkan ke halaman lain atau ditampilkan pesan error
    return redirect()->back()->with('error', 'Terjadi kesalahan dalam memproses pesanan.');
}

public function orderSuccess()
{
    return view('order_success');
}

public function increaseQuantity($index)
{
    // Ambil keranjang belanja dari session
    $cartItems = session('cart', []);

    // Periksa apakah indeks item valid
    if (isset($cartItems[$index])) {
        // Tambahkan jumlah pesanan untuk item yang dipilih
        $cartItems[$index]['quantity'] += 1;

        // Update keranjang belanja dalam session
        session()->set('cart', $cartItems);

        // Redirect ke halaman keranjang belanja
        return redirect()->to(site_url('cart'));
    }

    // Jika indeks item tidak valid, bisa diarahkan ke halaman lain atau ditampilkan pesan error
    return redirect()->back()->with('error', 'Item tidak ditemukan.');
}

public function decreaseQuantity($index)
{
    // Ambil keranjang belanja dari session
    $cartItems = session('cart', []);

    // Periksa apakah indeks item valid
    if (isset($cartItems[$index])) {
        // Tambahkan jumlah pesanan untuk item yang dipilih
        $cartItems[$index]['quantity'] -= 1;

        // Update keranjang belanja dalam session
        session()->set('cart', $cartItems);

        // Redirect ke halaman keranjang belanja
        return redirect()->to(site_url('cart'));
    }

    // Jika indeks item tidak valid, bisa diarahkan ke halaman lain atau ditampilkan pesan error
    return redirect()->back()->with('error', 'Item tidak ditemukan.');
}

public function removeItem($index)
{
    $cartItems = session('cart', []);

    if ($index >= 0 && $index < count($cartItems)) {
        unset($cartItems[$index]);
        $cartItems = array_values($cartItems); // Mengatur ulang indeks array
    }

    session()->set('cart', $cartItems);
    return redirect()->to(site_url('cart'));

}
}