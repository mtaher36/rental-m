<?php

namespace App\Controllers;

use App\Models\UserModel;



class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $data = [
            'title' => 'Login | Dashboard Admin',

        ];
        return view('auth/login', $data);
    }


    public function authe()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getVar('password');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $user = $this->userModel->getUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            // Login berhasil

            // Lakukan sesuatu, seperti menyimpan informasi pengguna di sesi
            $userData = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'pin' => $user['pin'],
                'password' => $user['password'],
                'is_google2fa_enabled' => $user['is_google2fa_enabled'],
                'google2fa_secret' => $user['google2fa_secret'],
                'logged_in' => true,
            ];
            $session->set('user', $userData);
            // Periksa apakah 2FA sudah diaktifkan
            if ($user['is_google2fa_enabled']) {
                // Jika 2FA sudah diaktifkan, arahkan ke halaman verifikasi 2FA
                return redirect()->to('mimin/verifikasi-2fa');
            } else {
                // Jika 2FA belum diaktifkan, arahkan ke halaman yang sesuai
                return redirect()->to('mimin/papan');
            }
        } else {
            // Login gagal
            session()->setFlashdata('errors', 'Username atau password salah');
            return redirect()->back()->withInput();
        }
    }


    public function verifikasi2fa()
    {
        $data = [
            'title' => 'Verifikasi 2 | Dashboard Admin',

        ];

        // Periksa apakah pengguna sudah login
        $user = session()->get('user');
        if (empty($user)) {
            // Redirect pengguna ke halaman login jika belum login
            return redirect()->to('/login');
        }

        if ($this->request->getMethod() === 'post') {
            // Proses verifikasi 2FA
            $secretKey = $user['google2fa_secret'];
            $inputCode = $this->request->getPost('2fa_code');
            $valid = $secretKey === $inputCode;
            if ($valid) {
                // Kode 2FA valid, lakukan sesuatu
                return redirect()->to('/mimin/papan'); // Sesuaikan dengan halaman tujuan setelah verifikasi sukses
            } else {
                // session()->setFlashdata('errors', 'Kode 2FA tidak valid');
            }
        }

        // Tampilkan halaman verifikasi 2FA
        return view('auth/verify_2fa', $data);
    }


    public function register()
    {
        $data = [
            'title' => 'Register | Nice Admin',
        ];
        return view('auth/register', $data);
    }

    public function storeUser()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|alpha_numeric|is_unique[users.username]',
            'email' => 'required|valid_email',
            'pin' => 'required|numeric',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('error', $validation->getErrors());
            return redirect()->back()->withInput();
        }


        $data = [
            'username' => esc($this->request->getPost('username')),
            'email' => esc($this->request->getPost('email')),
            'password' => esc(password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)),
            'pin' => esc($this->request->getPost('pin'))
        ];

        $this->userModel->createUser($data);

        session()->setFlashdata('success', 'Pengguna berhasil terdaftar');
        return redirect()->to('/mimin/login');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/mimin/login');
    }
}
