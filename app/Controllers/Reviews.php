<?php

namespace App\Controllers;

use App\Models\ReviewModel;

class Reviews extends BaseController
{
    protected $reviewModel;

    public function __construct()
    {
        $this->reviewModel = new ReviewModel();
    }

    public function listReviews()
    {
        $data = [
            'title' => 'List Rating | Dashboard Admin',
            'reviews' => $this->reviewModel->getReview(),

        ];
        return view('admin/reviews/listReview', $data);
    }

    public function tambahReviews()
    {
        $data = [
            'title' => 'Tambah Reviews | Dashboard Admin',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/reviews/tambahReviews', $data);
    }


    public function create()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_client' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'bintang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'pesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],

        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $this->reviewModel->insert(
                [
                    // $this->request->getVar();
                    'nama_client' =>  $this->request->getPost('nama_client'),
                    'bintang' =>  $this->request->getPost('bintang'),
                    'pesan' =>  $this->request->getPost('pesan'),

                ]
            );

            session()->setFlashdata('sukses', ' Data Berhasil Ditambahkan');
            return redirect()->to('/reviews');
        } {

            // $k = $validation->listErrors();
            session()->setFlashdata('errors', $validation->listErrors());
            return redirect()->to('/reviews/tambah')->withInput($validation);
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Dashboard Ubah Reviews',
            'validation' => \Config\Services::validation(),
            'reviews' => $this->reviewModel->getReview($id),

        ];
        return view('admin/reviews/editReviews', $data);
    }

    public function update($id)
    {
        $lama = $this->reviewModel->getReview($this->request->getPost('id'));
        // validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_client' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'bintang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'pesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],

        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $this->reviewModel->save(
                [
                    'id' => $id,
                    'nama_client' =>  $this->request->getPost('nama_client'),
                    'bintang' =>  $this->request->getPost('bintang'),
                    'pesan' =>  $this->request->getPost('pesan'),

                ]
            );
            session()->setFlashdata('sukses', ' Data Berhasil Dirubah');
            return redirect()->to('/reviews');
        } else {
            session()->setFlashdata('errors', $validation->listErrors());
            return redirect()->to('/reviews/edit/' . $lama['id'])->withInput();
        }
    }

    public function delete($id)
    {
        $this->reviewModel->delete($id);
        session()->setFlashdata('sukses', 'Delete Data Berhasil');
        return redirect()->to('/reviews');
    }
}
