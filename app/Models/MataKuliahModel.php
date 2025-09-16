<?php

namespace App\Models;

use CodeIgniter\Model;

class MataKuliahModel extends Model
{
    protected $table            = 'mata_kuliah';
    protected $primaryKey       = 'kode_mata_kuliah';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_mata_kuliah', 'nama_mata_kuliah', 'sks'];

    // Validation
    protected $validationRules = [
        'kode_mata_kuliah' => 'required|alpha_numeric_punct|min_length[5]|max_length[10]|is_unique[mata_kuliah.kode_mata_kuliah]',
        'nama_mata_kuliah' => 'required|min_length[3]',
        'sks'              => 'required|integer',
    ];
    // protected $validationMessages = [
    //     'kode_mata_kuliah' => [
    //         'is_unique' => 'Kode Mata Kuliah sudah ada.',
    //     ],
    //     'sks' => [
    //         'in_list' => 'Jumlah SKS tidak valid.'
    //     ]
    // ];

    public function getMataKuliahByNim($nim)
    {
        return $this->select('mata_kuliah.*, mmk.tanggal_mengambil')
            ->join('mahasiswa_mata_kuliah as mmk', 'mmk.kode_mata_kuliah = mata_kuliah.kode_mata_kuliah')
            ->where('mmk.nim', $nim)
            ->findAll();
    }
    
    public function getMataKuliahExceptNim($nim)
    {
        $subquery = $this->db->table('mahasiswa_mata_kuliah')
            ->select('kode_mata_kuliah')
            ->where('nim', $nim);

        return $this->whereNotIn('kode_mata_kuliah', $subquery)->findAll();
    }

    public function getMataKuliahWithMahasiswa($kode)
    {
        $matakuliah = $this->find($kode);
        if($matakuliah){
            $builder = $this->db->table('mahasiswa_mata_kuliah mmk');
            $builder->select('m.nim, u.nama_lengkap, mmk.tanggal_mengambil');
            $builder->join('mahasiswa m', 'm.nim = mmk.nim');
            $builder->join('users u', 'u.user_id = m.nim');
            $builder->where('mmk.kode_mata_kuliah', $kode);
            $matakuliah['mahasiswa'] = $builder->get()->getResultArray();
        }
        return $matakuliah;
    }
}
