<?php

namespace App\Controllers;

use PragmaRX\Google2FA\Google2FA;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;


use App\Models\UserModel;

class Profile extends BaseController
{
    protected $userModel;
    protected $session;
    public function __construct()
    {
        // Load the User model
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
    }


    public function index()
    {
        $model = new UserModel();
        // Ambil user dari sesi jika sudah login
        $user = session()->get('user');

        // Cek apakah user sudah login dan memiliki secret key
        if ($user && !empty($user['google2fa_secret'])) {
            $secretKey = $user['google2fa_secret'];
        } else {
            // Jika user belum login atau belum memiliki secret key, coba ambil dari sesi
            $secretKey = session()->get('google2fa_secret');

            // Jika secret key tidak ada dalam sesi, generate dan simpan secret key
            if (empty($secretKey)) {
                $google2fa = new Google2FA();
                $secretKey = $google2fa->generateSecretKey(16);

                // Jika user sudah login, simpan secret key ke dalam sesi user
                if ($user) {
                    $user['google2fa_secret'] = $secretKey;
                    session()->set('user', $user);
                } else {
                    // Jika user belum login, simpan secret key ke dalam sesi biasa
                    session()->set('google2fa_secret', $secretKey);
                }
            }
        }


        // Simpan secret key di sesi atau dalam database untuk pengguna tertentu
        $writer = new PngWriter();
        $qrCode =  QrCode::create($secretKey)
            ->setSize(300)
            ->setMargin(10)
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::High)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        $result = $writer->write($qrCode);

        $dataUri = $result->getDataUri();
        $data = [
            'title' => 'Profile | Dashboard Admin',
            'user' => $model->findAll(),
            'qr' => $dataUri,
            'activeTab' => 'profile-enable-2fa',
        ];

        // Menampilkan view dengan data users
        return view('admin/profile', $data);
    }

    public function edit($id)
    {
        // Mendapatkan data user berdasarkan ID
        $model = new UserModel();

        $data = [
            'title' => 'Profile | Dashboard Admin',
            'user' => $model->find($id),
            'activeTab' => 'profile-edit',
        ];


        // Tampilkan form edit dengan data pengguna
        return view('admin/profile', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();


        $validation->setRules([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'pin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->userModel->save(

                [
                    'id' => $id,
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'pin' => $this->request->getPost('pin'),
                ]
            );

            session()->setFlashdata('sukses', ' Data Berhasil Dirubah');
            return redirect()->to('/katalog');
        } {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function changePassword()
    {
        $memberID = $this->session->get('user')['id'];
        $old = $this->session->get('user')['password'];
        $currentPassword = $this->request->getVar('current_password');
        $newPassword = $this->request->getVar('new_password');
        if (password_verify($currentPassword, $old)) {

            $data = [
                'password' => password_hash($newPassword, PASSWORD_DEFAULT),
                'activeTab' => 'profile-change-password',

            ];
            $this->userModel->update($memberID, $data);
            session()->setFlashdata('sukses', ' Data Berhasil Dirubah');
            return redirect()->to('/katalog');
        }
        return redirect()->back()->withInput()->with('errors', 'Password saat ini tidak cocok');
    }
    public function verify2FA()
    {
        $user = session()->get('user');
        $memberID = $user['id']; // Gantilah dengan cara Anda mengambil data pengguna


        // Memeriksa apakah pengguna telah mengaktifkan 2FA
        if ($user['is_google2fa_enabled']) {
            return redirect()->to('profile')->with('errors', '2FA Sudah diaktifkan.');
        }

        // Ambil secret key dari sesi user atau sesi biasa
        $secretKey = !empty($user['google2fa_secret']) ? $user['google2fa_secret'] : session()->get('google2fa_secret');

        if (!empty($secretKey)) {
            // Autentikasi berhasil
            // Lakukan sesuatu seperti menyimpan informasi pengguna di sesi

            // Simpan informasi pengguna di sesi setelah autentikasi berhasil
            $userData = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'pin' => $user['pin'],
                'password' => $user['password'],
                'logged_in' => true,
                'is_google2fa_enabled' => true,
                'google2fa_secret' => $secretKey,
            ];
            session()->set('user', $userData);

            $data = [
                'is_google2fa_enabled' => true,
                'google2fa_secret' => $secretKey,

            ];
            $this->userModel->update($memberID, $data);

            // Redirect pengguna ke halaman yang sesuai setelah autentikasi berhasil
            return redirect()->to('/mimin/login')->with('success', 'Berhasil diaktifkan');
        }
        return redirect()->to('profile')->with('errors', 'Kode 2FA tidak Terbaca.');
    }
}
