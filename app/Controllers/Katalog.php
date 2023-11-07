<?php

namespace App\Controllers;

use App\Models\KatalogModel;

class Katalog extends BaseController
{
    protected $katalogModel;

    public function __construct()
    {
        $this->katalogModel = new KatalogModel();
    }

    public function listKatalog()
    {
        $data = [
            'title' => 'List Katalog | Dashboard Admin',
            'katalog' => $this->katalogModel->getKatalog(),

        ];
        return view('admin/katalog/listKatalog', $data);
    }

    public function tambahKatalog()
    {
        $data = [
            'title' => 'Tambah Katalog | Dashboard Admin',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/katalog/tambahKatalog', $data);
    }


    public function create()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'cc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'sampul' => [
                'rules' => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'jangan gede gede',
                    'is_image' => 'yang anda pilih bkn gambar asw',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        // // ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        // ngambil gambar default
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpeg';
        } else {
            // ambil nama file random
            $namaSampul = $fileSampul->getRandomName();
            // pindah gambar ke img
            $fileSampul->move('img/cover', $namaSampul);
        }

        if ($isDataValid) {
            $this->katalogModel->insert(
                [
                    // $this->request->getVar();
                    'judul' =>  $this->request->getPost('judul'),
                    'tahun' =>  $this->request->getPost('tahun'),
                    'cc' =>  $this->request->getPost('cc'),
                    'jenis' =>  $this->request->getPost('jenis'),
                    'sampul' =>  $namaSampul,
                ]
            );

            session()->setFlashdata('sukses', ' Data Berhasil Ditambahkan');
            return redirect()->to('/katalog/tambah');
        } {

            // $k = $validation->listErrors();
            session()->setFlashdata('errors', $validation->listErrors());
            return redirect()->to('/katalog/tambah')->withInput($validation);
        }
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Dashboard Ubah Data Buku',
            'validation' => \Config\Services::validation(),
            'katalog' => $this->katalogModel->getKatalog($id),

        ];
        return view('admin/katalog/editKatalog', $data);
    }

    public function update($id)
    {

        // validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'cc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'sampul' => [
                'rules' => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'jangan gede gede',
                    'is_image' => 'yang anda pilih bkn gambar asw',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // // ambil gambar
        $sampulLama = $this->katalogModel->getKatalog($this->request->getPost('id'));

        $fileSampul = $this->request->getFile('sampul');
        // ngambil gambar default
        if ($fileSampul->getError() == 4) {
            $namaSampul = $sampulLama['sampul'];
        } else {
            // ambil nama file random
            $namaSampul = $fileSampul->getRandomName();
            // pindah gambar ke img
            $fileSampul->move('img/cover', $namaSampul);
            if ($sampulLama['sampul'] != 'default.jpeg') {
                unlink('img/cover/' . $sampulLama['sampul']);
            }
        }

        if ($isDataValid) {
            $this->katalogModel->save(
                [
                    'id' => $this->request->getPost('id'),
                    'judul' =>  $this->request->getPost('judul'),
                    'tahun' =>  $this->request->getPost('tahun'),
                    'jenis' =>  $this->request->getPost('jenis'),
                    'cc' =>  $this->request->getPost('cc'),
                    'sampul' =>  $namaSampul,

                ]
            );
            session()->setFlashdata('sukses', ' Data Berhasil Dirubah');
            return redirect()->to('/katalog');
        } else {
            session()->setFlashdata('errors', $validation->listErrors());
            return redirect()->to('/katalog/edit/' . $sampulLama['id'])->withInput();
        }
    }

    public function delete($id)
    {
        $katalog = $this->katalogModel->find($id);
        if ($katalog['sampul'] != 'default.jpg') {
            // hapus gambar
            $gambarPath = FCPATH . 'img\cover/' . $katalog['sampul'];
            unlink($gambarPath);
        }
        $this->katalogModel->delete($id); //Cara ini cara konvensional, bahayaaaa!
        session()->setFlashdata('sukses', 'Delete Data Berhasil');
        return redirect()->to('/katalog');
    }
}
