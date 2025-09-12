<?php

namespace App\Database\Seeds;

use App\Models\MahasiswaModel;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class CreateUser extends Seeder
{
    public function run()
    {
        $model = new UserModel();

        $model->insert([
            'user_id' => '241511016',
            'username' => 'mavl2808',
            'email'    => 'maulanaishak@gmail.com',
            'password' => password_hash('maulana123', PASSWORD_BCRYPT),
            'role' => 'Mahasiswa',
            'nama_lengkap' => 'Maulana Ishak'
        ]);

        $model = new MahasiswaModel();
        $model->insert([
            'nim' => '241511016',
            'tahun_masuk' => 2024
        ]);

        
    }
}
