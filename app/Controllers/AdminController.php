<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\SalesModel;
use App\Models\ProductModel;
use App\Models\MejaModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function admin()
    {
        $orderModel = new OrderModel();
        $orders = $orderModel->findAll();
    
        $productModel = new ProductModel();
        $products = $productModel->findAll();
    
        $salesModel = new SalesModel();
        $dailyIncome = $salesModel->getDailyIncome();
    
        $data = [
            'orders' => $orders,
            'products' => $products,
            'dailyIncome' => $dailyIncome
        ];
    
        return view('admin', $data);
    }
    

    public function updateMenu($productId)
    {
        // Lakukan pengecekan, pemrosesan data, dan pembaruan menu
        // ...

        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        // Memastikan produk ditemukan sebelum ditampilkan
        if (!$product) {
            return redirect()->to('admin')->with('error', 'Produk tidak ditemukan.');
        }

        // Load view "update_menu.php" dan kirimkan data product ke view
        return view('update_menu', ['product' => $product]);
    }

    public function processUpdateMenu($productId)
    {
        // Proses data yang dikirimkan dari formulir update menu
        // ...

        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        // Memastikan produk ditemukan sebelum pembaruan
        if (!$product) {
            return redirect()->to('admin')->with('error', 'Produk tidak ditemukan.');
        }

        // Lakukan validasi dan pembaruan data produk
        // ...

        // Misalnya, jika ingin memperbarui nama dan harga produk:
        $productData = [
            'name' => $_POST['menu_name'],
            'price' => $_POST['price']
        ];

        $productModel->update($productId, $productData);

        return redirect()->to('admin')->with('success', 'Menu berhasil diperbarui.');
    }


    public function addMenu()
    {
        // Tampilkan halaman "add_menu.php" (formulir tambah menu)
        return view('add_menu');
    }
    
    public function processAddMenu()
{
    // Proses data yang dikirimkan dari formulir tambah menu
    // ...

    // Misalnya, jika ingin menambahkan menu baru ke dalam database:
    $productModel = new ProductModel();

    // Ambil informasi gambar yang diunggah
    $image = $_FILES['image'];

    if ($image['error'] === UPLOAD_ERR_OK) {
        $imageName = $image['name'];

        $productData = [
            'name' => $_POST['menu_name'],
            'price' => $_POST['price'],
            'picture' => $imageName // Simpan nama file gambar ke dalam basis data
        ];

        $productModel->insert($productData);

        return redirect()->to('admin')->with('success', 'Menu berhasil ditambahkan.');
    } else {
        // Handle error uploading image
        return redirect()->back()->with('error', 'Gagal mengunggah gambar menu.');
    }
}

public function deleteMenu($productId)
{
    $productModel = new \App\Models\ProductModel();

    // Ambil data menu berdasarkan $productId
    $product = $productModel->find($productId);

    if (!$product) {
        // Menu tidak ditemukan, lakukan penanganan error
        return redirect()->back()->with('error', 'Menu tidak ditemukan.');
    }

    // Hapus menu dari database
    $productModel->delete($productId);

    return redirect()->to('admin')->with('success', 'Menu berhasil dihapus.');
}


    
    public function validateOrder($orderId)
{
    $orderModel = new OrderModel();

    // Ambil data pesanan berdasarkan $orderId
    $order = $orderModel->find($orderId);

    if (!$order) {
        // Pesanan tidak ditemukan, lakukan penanganan error
        return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
    }

    // Validasi dan proses validasi pesanan
    // ...

    // Set status validasi pesanan menjadi 1 (sukses)
    $data = [
        'validated' => 1,
        'validation_status' => 'Sukses'
    ];

    $orderModel->update($orderId, $data);

    return redirect()->to(site_url('admin'));
}


    public function deleteOrder($orderId)
    {
        $orderModel = new OrderModel();

        // Ambil data pesanan berdasarkan $orderId
        $order = $orderModel->find($orderId);

        if (!$order) {
            // Pesanan tidak ditemukan, lakukan penanganan error
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        // Proses penghapusan pesanan
        $orderModel->delete($orderId);

        return redirect()->to(site_url('admin'));

    }
    public function orders()
{
    $orderModel = new OrderModel();
    $orders = $orderModel->findAll();

    $data = [
        'orders' => $orders
    ];

    return view('admin_orders', $data);
}
public function salesReport()
{
    $orderModel = new OrderModel();
    $menuSales = $orderModel->select('menu_name, SUM(quantity) as total_sales, SUM(total_price) as total_revenue')
        ->groupBy('menu_name')
        ->findAll();

    $data = [
        'menuSales' => $menuSales
    ];

    return view('sales_report', $data);
}

public function manageMeja()
{
    $mejaModel = new MejaModel();
    $data['meja'] = $mejaModel->findAll();

    return view('manage_meja', $data);
}
public function setStatusMeja($id)
{
    $mejaModel = new MejaModel();
    $meja = $mejaModel->find($id);

    if ($meja) {
        $data['meja'] = $meja;
        return view('set_meja_status', $data);
    } else {
        // Handle jika meja tidak ditemukan
        return redirect()->to(site_url('manage_meja'));
    }
}
public function setMejaStatus($id)
{
    $mejaModel = new MejaModel();
    $meja = $mejaModel->find($id);

    if ($meja) {
        // Ubah status meja menjadi status baru (misalnya 'tersedia' atau 'tidak tersedia')
        $newStatus = ($meja['status'] == 'Terisi') ? 'Kosong' : 'Terisi';
        $meja['status'] = $newStatus;

        // Simpan perubahan ke dalam database
        $mejaModel->save($meja);
    }

    // Arahkan pengguna kembali ke halaman sebelumnya (misalnya halaman manage_meja)
    return redirect()->to(site_url('admin'));
}

}




