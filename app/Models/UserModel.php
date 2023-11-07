<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email', 'username', 'pin', 'password', 'role', 'is_google2fa_enabled', 'google2fa_secret'
    ];


    public function getUsers($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getUserById($id)
    {
        return $this->find($id);
    }

    public function getUserByUsername($username)
    {
        return $this->where(['username' => $username])->first();
    }

    public function updatePassword($id, $newPasswordHash)
    {
        $this->where('id', $id)->set(['password_hash' => $newPasswordHash])->update();
    }

    public function createUser($data)
    {
        $this->insert($data);
    }
}
