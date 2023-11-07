<?php

namespace App\Controllers;

use App\Models\KatalogModel;
use App\Models\ReviewModel;

class Client extends BaseController
{
    protected $katalogModel;
    protected $reviewModel;

    public function __construct()
    {
        $this->katalogModel = new KatalogModel();
        $this->reviewModel = new ReviewModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Sewa Motor Ale',
            // 'katalog' => $this->katalogModel->getKatalog(),
            'katalog' => $this->katalogModel->paginate(12),
            'reviews' =>  $this->reviewModel->getReview(),
            'pager' => $this->katalogModel->pager,
        ];

        return view('client/index', $data);
    }

    public function detail($id)
    {
        $review = $this->reviewModel->findAll();
        if (!empty($review)) {
            // Mengambil indeks acak
            $randomIndex = array_rand($review);

            // Mengambil data dengan indeks acak
            $randomData = $review[$randomIndex];

            // Mengambil nama dan pesan dari data yang diambil secara acak
            $randomName = $randomData['nama_client'];
            $randomMessage = $randomData['pesan'];

            // Menyimpan data yang diambil dalam array
            $data = [
                'title' => 'Detail Katalog',
                'katalog' => $this->katalogModel->getKatalog($id),
                'list' => $this->katalogModel->getKatalog(),
                'randomName' => $randomName,
                'randomMessage' => $randomMessage,
                'reviews' =>  $this->reviewModel->getReview()
            ];

            return view('client/detailKatalog', $data);
        } else {
        }
    }
}
