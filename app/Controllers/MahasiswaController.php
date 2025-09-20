<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\UserModel;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();
        $keyword = $this->request->getGet('keyword');
        $tahun_masuk = $this->request->getGet('tahun_masuk');

        $data['mahasiswa'] = $model->searchAndFilter($keyword, $tahun_masuk);
        $data['title'] = 'Daftar Mahasiswa';
        $data['tahun_masuk_options'] = $model->getTahunMasukOptions();
        $data['keyword'] = $keyword;
        $data['selected_tahun'] = $tahun_masuk;

        return view('admin/mahasiswa/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Mahasiswa';
        return view('admin/mahasiswa/create', $data);
    }

    public function store()
    {
        $mahasiswaModel = new MahasiswaModel();
        $userModel = new UserModel();

        $validation = \Config\Services::validation();
        // $rules = array_merge(
        //     $userModel->getValidationRules(),
        //     $mahasiswaModel->getValidationRules()
        // );

        $nim = $this->request->getPost('nim');
        $rules = [
            'nim'          => "required|numeric|exact_length[9]|is_unique[users.user_id]",
            'nama_lengkap' => 'required|alpha_space|min_length[3]',
            'username'     => "required|alpha_numeric|min_length[5]|is_unique[users.username]",
            'tahun_masuk'  => 'required|numeric|exact_length[4]',
            'password'     => 'required|min_length[8]',
        ];

        $validation->setRules($rules);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $userData = [
            'user_id'      => $this->request->getPost('nim'),
            'username'     => $this->request->getPost('username'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'         => 'mahasiswa',
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
        ];
        
        $mahasiswaData = [
            'nim'         => $this->request->getPost('nim'),
            'tahun_masuk' => $this->request->getPost('tahun_masuk'),
        ];

        if ($userModel->insert($userData) && $mahasiswaModel->insert($mahasiswaData)) {
            return redirect()->to('/admin/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
        }

        return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data mahasiswa.');
    }

    public function detail($nim)
    {
        $mahasiswaModel = new MahasiswaModel();
        $data['mahasiswa'] = $mahasiswaModel->getMahasiwaWithMatkul($nim);

        if (empty($data['mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mahasiswa dengan NIM ' . $nim . ' tidak ditemukan');
        }

        $data['title'] = 'Detail Mahasiswa';
        return view('admin/mahasiswa/detail', $data);
    }

    public function edit($nim)
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->getMahasiwa($nim);
        

        if (empty($data['mahasiswa'])) {
           return redirect()->to('/admin/mahasiswa')->with('error', 'Mahasiswa dengan NIM ' . $nim . ' tidak ditemukan');
        }

        
        $data['title'] = 'Edit Mahasiswa';
        return view('admin/mahasiswa/edit', $data);
    }

    public function update($nim)
    {
        $mahasiswaModel = new MahasiswaModel();
        $userModel = new UserModel();
    
        $validationRules = [
            'nim'          => "required|numeric|exact_length[9]|is_unique[users.user_id,user_id,{$nim}]",
            'nama_lengkap' => 'required|alpha_space|min_length[3]',
            'username'     => "required|alpha_numeric|min_length[5]|is_unique[users.username,user_id,{$nim}]",
            'tahun_masuk'  => 'required|numeric|exact_length[4]',
            'password'     => 'permit_empty|min_length[8]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $userData = [
            'user_id'      => $this->request->getPost('nim'),
            'username'     => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
        ];
        
        if ($this->request->getPost('password')) {
            $userData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $mahasiswaData = [
            'nim'         => $this->request->getPost('nim'),
            'tahun_masuk' => $this->request->getPost('tahun_masuk'),
        ];
        
        // Use transaction to ensure data consistency
        // $db = \Config\Database::connect();
        // $db->transStart();
        
        $userModel->update($nim, $userData);
        $mahasiswaModel->update($nim, $mahasiswaData);
        
        // $db->transComplete();

        // if ($db->transStatus() === false) {
        //      return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data.');
        // }

        return redirect()->to('/admin/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }


    public function delete($nim)
    {
        $userModel = new UserModel();
        if ($userModel->delete($nim)) {
            return redirect()->to('/admin/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
        }
        
        return redirect()->to('/admin/mahasiswa')->with('error', 'Gagal menghapus data mahasiswa.');
    }

    // API
    public function search()
    {
        $model = new MahasiswaModel();
        $keyword = $this->request->getGet('keyword');
        $tahun_masuk = $this->request->getGet('tahun_masuk');

        $mahasiswa = $model->searchAndFilter($keyword, $tahun_masuk);
        
        return $this->response->setJSON($mahasiswa);
    }
}
