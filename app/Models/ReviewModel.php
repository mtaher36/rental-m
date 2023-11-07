<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_client', 'bintang', 'pesan', 'created_at'];

    public function getReview($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }


    public function getTotalReviews()
    {
        return $this->countAll(); // Mengembalikan jumlah seluruh data pengguna
    }
}
