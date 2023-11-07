<?php

namespace App\Controllers;

use App\Models\KatalogModel;
use App\Models\ReviewModel;

class Admin extends BaseController
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
            'title' => 'Dashboard Admin Rental',
            'katalog' => $this->katalogModel->getKatalog(),
            'reviews' =>  $this->reviewModel->getReview(),
            'totalKatalog' =>  $this->katalogModel->getTotalKatalog(),
            'totalReviews' =>  $this->reviewModel->getTotalReviews(),
        ];

        return view('admin/home', $data);
    }
}
