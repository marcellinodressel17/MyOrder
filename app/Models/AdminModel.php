<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password'];

    // Method untuk mendapatkan data admin berdasarkan username
    public function getByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
