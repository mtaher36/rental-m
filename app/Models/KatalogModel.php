<?php

namespace App\Models;

use CodeIgniter\Model;

class katalogModel extends Model
{
    protected $table = 'katalog';
    protected $primaryKey = 'id';
    // protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'sampul', 'tahun', 'cc', 'jenis'];

    public function getSampul($sampul)
    {
        return $this->select('sampul')
            ->where('id', $sampul)
            ->first();
    }

    public function getKatalog($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getJenis($jenis = false)
    {
        if ($jenis == false) {
            return $this->findAll();
        }

        return $this->where(['jenis' => $jenis])->first();
    }

    public function getTotalKatalog()
    {
        return $this->countAll(); // Mengembalikan jumlah seluruh data pengguna
    }
}
