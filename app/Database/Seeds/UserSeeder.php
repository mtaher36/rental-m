<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email'    => 'admin02@admin.com',
            'username' => 'minmin',
            'pin'      => 3321,
            'password' => password_hash('qweasdzxc', PASSWORD_DEFAULT),

        ];
        $this->db->query('INSERT INTO users (username, email, pin, password) VALUES(:username:, :email:, :pin:, :password:)', $data);
    }
}
