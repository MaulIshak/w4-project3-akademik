<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'nim';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['nim', 'tahun_masuk'];

    // Validation
    protected $validationRules = [
        'nim'         => 'required|numeric|exact_length[9]|is_unique[mahasiswa.nim]',
        'tahun_masuk' => 'required|numeric|exact_length[4]',
    ];
    protected $validationMessages = [
        'nim' => [
            'is_unique' => 'NIM sudah terdaftar.',
            'exact_length' => 'NIM harus 9 digit.'
        ]
    ];


    public function getMahasiwa($nim = false)
    {
        if ($nim) {
            return $this->select('mahasiswa.*, users.username, users.nama_lengkap, users.password')
                ->join('users', 'users.user_id = mahasiswa.nim')
                ->where('mahasiswa.nim', $nim)
                ->first();
        }

        return $this->select('mahasiswa.nim, mahasiswa.tahun_masuk, users.nama_lengkap')
            ->join('users', 'users.user_id = mahasiswa.nim')
            ->findAll();
    }

    public function getMahasiwaWithMatkul($nim)
    {
        $mahasiswa = $this->getMahasiwa($nim);
        if ($mahasiswa) {
            $matkulModel = new MataKuliahModel();
            $mahasiswa['mata_kuliah'] = $matkulModel->getMataKuliahByNim($nim);
        }
        return $mahasiswa;
    }
}
