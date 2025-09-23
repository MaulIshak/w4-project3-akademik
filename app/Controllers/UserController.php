<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaMataKuliahModel;
use App\Models\MataKuliahModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class UserController extends BaseController
{
    private $nim;

    public function __construct()
    {
        $this->nim = session()->get('user_id');
    }

    public function index()
    {
        $matakuliahModel = new MataKuliahModel();
        $userModel = new UserModel();

        $matkul_diambil = $matakuliahModel->getMataKuliahByNim($this->nim);
        $total_sks = 0;
        foreach($matkul_diambil as $matkul){
            $total_sks += (int)$matkul['sks'];
        }

        $data = [
            'title' => 'Dashboard Mahasiswa',
            'mahasiswa' => $userModel->getMahasiswaData($this->nim),
            'jumlah_matkul' => count($matkul_diambil),
            'total_sks' => $total_sks
        ];
        return view('mahasiswa/dashboard', $data);
    }

    public function profile()
    {
        $userModel = new UserModel();
        $data = [
            'title' => 'Profil Mahasiswa',
            'mahasiswa'  => $userModel->getMahasiswaData($this->nim)
        ];
        return view('mahasiswa/profile', $data);
    }

    public function update_password()
    {
        $userModel = new UserModel();
        $user = $userModel->find($this->nim);

        if (!password_verify($this->request->getPost('current_password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Password saat ini salah.');
        }

        $rules = [
            'current_password' => 'required',
            'new_password'     => 'required|min_length[8]',
            'confirm_password' => 'required|matches[new_password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }


        $userModel->update($this->nim, [
            'password' => password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT)
        ]);
        
        return redirect()->to('/mahasiswa/profile')->with('success', 'Password berhasil diubah.');
    }


    public function mata_kuliah()
    {
        $matkulModel = new MataKuliahModel();
        $data = [
            'title'            => 'Mata Kuliah',
            'matkul_tersedia'  => $matkulModel->getMataKuliahExceptNim($this->nim),
            'matkul_diambil'   => $matkulModel->getMataKuliahByNim($this->nim),
        ];
        if($this->request->isAJAX()){
            return $this->response->setJSON($data);
        }

        return view('mahasiswa/matakuliah', $data);
    }

    public function ambil_mata_kuliah()
    {
        $mahasiswaMatkulModel = new MahasiswaMataKuliahModel();
        $kodeMatkul = [];
        if($this->request->isAJAX()) {
            $data = $this->request->getJSON();
            foreach ($data as $item) {
                $kodeMatkul[] = $item->kode_mata_kuliah;
            }
        } else {
            $kodeMatkul = $this->request->getPost('ambil_mk');
        }
        if (empty($kodeMatkul)) {
            return redirect()->back()->with('error', 'Tidak ada mata kuliah yang dipilih.');
        }
        
        $data = [];
        foreach ($kodeMatkul as $kode) {
            $data[] = [
                'nim'               => $this->nim,
                'kode_mata_kuliah'  => $kode,
                'tanggal_mengambil' => Time::now(),
            ];
        }

        $mahasiswaMatkulModel->insertBatch($data);

        if($this->request->isAJAX()){
            return $this->response->setJSON(['success' => true, 'message' => 'Mata kuliah berhasil diambil.']);
        }

        return redirect()->to('/mahasiswa/matakuliah')->with('success', 'Mata kuliah berhasil diambil.');
    }

    public function hapus_mata_kuliah()
    {
        $mahasiswaMatkulModel = new MahasiswaMataKuliahModel();

        $kodeMatkul =[];

        if($this->request->isAJAX()) {
            $data = $this->request->getJSON();
            foreach ($data as $item) {
                $kodeMatkul[] = $item->kode_mata_kuliah;
            }
        } else {
            $kodeMatkul = $this->request->getPost('batal_mk');
        }

        if (empty($kodeMatkul)) {
            return redirect()->back()->with('error', 'Tidak ada mata kuliah yang dipilih.');
        }

        $mahasiswaMatkulModel->where('nim', $this->nim)
                             ->whereIn('kode_mata_kuliah', $kodeMatkul)
                             ->delete();
                             
        if($this->request->isAJAX()){
            return $this->response->setJSON(['success' => true, 'message' => 'Mata kuliah berhasil dibatalkan.']);
        }

        return redirect()->to('/mahasiswa/matakuliah')->with('success', 'Mata kuliah berhasil dibatalkan.');
    }
}
