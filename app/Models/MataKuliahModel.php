<?php

namespace App\Models;

use CodeIgniter\Model;

class MataKuliahModel extends Model
{
    protected $table            = 'mata_kuliah';
    protected $primaryKey       = 'kode_mata_kuliah';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_mata_kuliah', 'nama_mata_kuliah', 'sks'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getMataKuliahByNim($nim){
        return $this->select('mata_kuliah.kode_mata_kuliah, mata_kuliah.nama_mata_kuliah, mata_kuliah.sks, mahasiswa_mata_kuliah.tanggal_mengambil ')
        ->join('mahasiswa_mata_kuliah','mahasiswa_mata_kuliah.kode_mata_kuliah = mata_kuliah.kode_mata_kuliah' )
        ->join('mahasiswa', 'mahasiswa.nim = mahasiswa_mata_kuliah.nim')
        ->where('mahasiswa.nim', $nim)
        ->findAll();
    }
    public function getMataKuliahExceptNim($nim){
        // Subquery untuk mendapatkan semua kode mata kuliah yang diambil oleh NIM tertentu.
        $subquery = $this->db->table('mahasiswa_mata_kuliah')
                            ->select('kode_mata_kuliah')
                            ->where('nim', $nim);

        // Query utama: pilih semua mata kuliah yang kodenya tidak ada di dalam hasil subquery.
        return $this->select('kode_mata_kuliah, nama_mata_kuliah, sks')
                    ->whereNotIn('kode_mata_kuliah', $subquery)
                    ->findAll();
    }

    public function getMataKuliah($kode = false){
        if($kode){
            return $this->where('mata_kuliah.kode_mata_kuliah', $kode)->first();
        }else{
            return $this->findAll();
        }
    }
}
