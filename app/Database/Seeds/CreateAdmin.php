<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class CreateAdmin extends Seeder
{
    public function run()
    {
        $model = new UserModel();
        $model->insert([
            'user_id' => 'ADMIN-01',
            'username' => 'admin123',
            'email'    => 'admin123@gmail.com',
            'password' => password_hash('maulana123', PASSWORD_BCRYPT),
            'role' => 'admin',
            'nama_lengkap' => 'Admin'
        ]);
    }
}
