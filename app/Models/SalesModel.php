<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesModel extends Model
{
    protected $table = 'sales'; // Nama tabel untuk menyimpan data keranjang
    protected $primaryKey = 'id'; // Nama kolom primary key
    protected $allowedFields = ['menu_name', 'quantity', 'date','income']; // Kolom yang diizinkan untuk diisi

    public function getDailyIncome()
    {
        $query = $this->selectSum('income')
            ->where('date', date('Y-m-d'))
            ->get();

        $row = $query->getRow();
        $dailyIncome = $row->income;

        return $dailyIncome;
    }
}