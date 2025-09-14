<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaMataKuliahModel;
use App\Models\MahasiswaModel;
use App\Models\MataKuliahModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    // View
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        return view('/admin/dashboard', $data);
    }
    public function create_mahasiswa()
    {
        $data['title'] = 'Create Mahasiswa';
        return view('/admin/mahasiswa/create', $data);
    }
    public function edit_mahasiswa()
    {
        $data['title'] = 'Edit Mahasiswa';
        return view('/admin/mahasiswa/edit', $data);
    }

    public function list_mahasiswa(){
        $model = new MahasiswaModel();
        
        $data['mahasiswa'] = $model->getMahasiwa();
        $data['title'] = 'Daftar Mahasiswa';
        return view('/admin/mahasiswa/index', $data);
    }

    public function detail_mahasiswa($nim){
        $modelMahasiswa = new MahasiswaModel();
        $modelMataKuliah = new MataKuliahModel();
        
        $data['title'] = 'Detail Mahasiswa';

        // Cari mahasiswa
        $mahasiswa = $modelMahasiswa->getMahasiwa($nim);

        if($mahasiswa){
            // Cari semua mata kuliah yang diambil
            $mataKuliah = $modelMataKuliah->getMataKuliahByNim($mahasiswa['nim']);
            // Gabungkan
            $mahasiswa['mata_kuliah'] = $mataKuliah;

            $data['mahasiswa'] = $mahasiswa;

            return view('/admin/mahasiswa/detail' ,$data);
            
        }else{
            return redirect()->back();
        }
    }

    public function mata_kuliah(){
        $model = new MataKuliahModel();
        $data['title'] = 'Daftar Mata Kuliah';

        $data['mataKuliah'] = $model->getMataKuliah();
        return view('/admin/matakuliah/index', $data);
    }
    public function detail_mata_kuliah($kode){
        $modelMahasiswa = new MahasiswaModel();
        $modelMataKuliah = new MataKuliahModel();
        
        $data['title'] = 'Detail Mahasiswa';

        // Cari mata kuliah
        $mataKuliah = $modelMataKuliah->getMataKuliah($kode);

        if($mataKuliah){
            // Cari semua mahasiswa yang mengambil
            $mahasiswa = $modelMahasiswa->getMahasiwaByMatkul($mataKuliah['kode_mata_kuliah']);
            // Gabungkan
            $mataKuliah['mahasiswa'] = $mahasiswa;

            $data['mataKuliah'] = $mataKuliah;

            return view('/admin/matakuliah/detail', $data);
        }else{
            return redirect()->back();
        }
    }
    public function edit_mata_kuliah(){
        $data['title'] = 'Edit Mata Kuliah';
        return view('/admin/matakuliah/edit', $data);
    }
    public function tambah_mata_kuliah(){
        $data['title'] = 'Tambah Mata Kuliah';
        return view('/admin/matakuliah/create', $data);
    }

    // DB

    public function store_mahasiswa(){
        $modelMahasiswa = new MahasiswaModel();
        $modelUser = new UserModel();

        $mahasiswa = [
            'nim' => $this->request->getPost('nim'),
            'tahun_masuk' => $this->request->getPost('tahun_masuk'),
        ];

        $user = [
            'user_id' => $mahasiswa['nim'],
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role' => 'mahasiswa',
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
        ];

        $modelUser->insert($user);
        $modelMahasiswa->insert($mahasiswa);

        return redirect()->to('/admin/mahasiswa');
    }

}
