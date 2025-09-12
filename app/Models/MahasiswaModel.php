<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'nim';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nim', 'tahun_masuk'];

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

    public function getMahasiwa($nim = false){
        if($nim){
            return $this->select('mahasiswa.*, users.username, user.nama_lengkap')
                    ->join('users', 'users.user_id = mahasiswa.nim')
                    ->where('mahasiwa.nim', $nim)
                    ->first();
        }else{
            return $this->select('mahasiswa.*, users.username, user.nama_lengkap')
                    ->join('users', 'users.user_id = mahasiswa.nim')
                    ->findAll();
        }
    }

    public function getMahasiswaByTahun($tahun){
        return $this->select('mahasiswa.*, users.username, user.nama_lengkap')
                    ->join('users', 'users.user_id = mahasiswa.nim')
                    ->where('tahun_masuk', $tahun)
                    ->findAll();
    }
}
