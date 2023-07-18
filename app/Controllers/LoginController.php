<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LoginController extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function process()
    {
        // Ambil data dari form login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Lakukan validasi jika diperlukan

        // Cek kecocokan username dan password
        $validUsername = 'admin'; // Ganti dengan username yang ada di database
        $validPassword = '123'; // Ganti dengan password yang ada di database

        if ($username === $validUsername && $password === $validPassword) {
            // Jika login berhasil, set session atau tindakan lainnya sesuai kebutuhan
            session()->set('isLoggedIn', true);
            return redirect()->to(site_url('admin')); // Ganti dengan halaman tujuan setelah login berhasil
        } else {
            // Jika login gagal, tampilkan pesan error
            $data['error'] = 'Username atau password salah';
            return view('login', $data);
        }
    }

    public function logout()
    {
        // Lakukan tindakan saat logout, seperti menghapus session atau tindakan lainnya sesuai kebutuhan
        session()->remove('isLoggedIn');
        return redirect()->to(site_url('myorder')); // Ganti dengan halaman tujuan setelah logout
    }
}
