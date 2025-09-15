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

        public function searchAndFilter($keyword, $tahun_masuk)
        {
        $builder = $this->select('mahasiswa.nim, mahasiswa.tahun_masuk, users.nama_lengkap')
                        ->join('users', 'users.user_id = mahasiswa.nim');

        if ($keyword) {
            $builder->groupStart()
                    ->like('mahasiswa.nim', $keyword)
                    ->orLike('users.nama_lengkap', $keyword)
                    ->groupEnd();
        }

        if ($tahun_masuk) {
            $builder->where('mahasiswa.tahun_masuk', $tahun_masuk);
        }

        return $builder->findAll();
    }

    public function getTahunMasukOptions()
    {
        return $this->distinct()->select('tahun_masuk')->orderBy('tahun_masuk', 'DESC')->findAll();
    }


    public function getMahasiswaTanpaMatkul()
    {
        return $this->whereNotIn('nim', function($builder) {
            return $builder->select('nim')->from('mahasiswa_mata_kuliah');
        })->countAllResults();
    }
}
