<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'username', 'password', 'role', 'nama_lengkap'];

    // Validation
    protected $validationRules = [
        'user_id'      => 'required|numeric|exact_length[9]|is_unique[users.user_id]',
        'username'     => 'required|alpha_numeric|min_length[5]|is_unique[users.username]',
        'password'     => 'required|min_length[8]',
        'nama_lengkap' => 'required|alpha_space|min_length[3]',
    ];
    protected $validationMessages = [
        'user_id' => [
            'is_unique' => 'NIM/User ID sudah terdaftar.',
            'exact_length' => 'NIM/User ID harus 9 digit.'
        ],
        'username' => [
            'is_unique' => 'Username sudah digunakan.'
        ]
    ];

    public function getMahasiswaData($nim)
    {
        return $this->select('users.*, mahasiswa.tahun_masuk')
            ->join('mahasiswa', 'mahasiswa.nim = users.user_id')
            ->where('users.user_id', $nim)
            ->first();
    }
}
