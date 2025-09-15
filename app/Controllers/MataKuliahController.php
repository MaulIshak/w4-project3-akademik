<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MataKuliahModel;

class MataKuliahController extends BaseController
{
    public function index()
    {
        $model = new MataKuliahModel();
        $keyword = $this->request->getGet('keyword');
        $data['mataKuliah'] = $model->like('nama_mata_kuliah', $keyword??'')->orLike('kode_mata_kuliah', $keyword??'')->findAll();
        $data['title'] = 'Daftar Mata Kuliah';
        $data['keyword'] = $keyword;
        return view('admin/matakuliah/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Mata Kuliah';
        return view('admin/matakuliah/create', $data);
    }

    public function store()
    {
        $model = new MataKuliahModel();

        if (!$this->validate($model->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->save([
            'kode_mata_kuliah' => $this->request->getPost('kode_mata_kuliah'),
            'nama_mata_kuliah' => $this->request->getPost('nama_mata_kuliah'),
            'sks'              => $this->request->getPost('sks'),
        ]);

        return redirect()->to('/admin/matakuliah')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function detail($kode)
    {
        $model = new MataKuliahModel();
        $data['mataKuliah'] = $model->getMataKuliahWithMahasiswa($kode);

        if (empty($data['mataKuliah'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mata Kuliah dengan kode ' . $kode . ' tidak ditemukan.');
        }
        
        $data['title'] = 'Detail Mata Kuliah';
        return view('admin/matakuliah/detail', $data);
    }

    public function edit($kode)
    {
        $model = new MataKuliahModel();
        $data['matakuliah'] = $model->find($kode);

        if (empty($data['matakuliah'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mata Kuliah dengan kode ' . $kode . ' tidak ditemukan.');
        }

        $data['title'] = 'Edit Mata Kuliah';
        return view('admin/matakuliah/edit', $data);
    }

    public function update($kode)
    {
        $model = new MataKuliahModel();
        
        $validationRules = [
            'nama_mata_kuliah' => 'required|min_length[3]',
            'sks'              => 'required|integer|in_list[1,2,3,4,6]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->update($kode, [
            'nama_mata_kuliah' => $this->request->getPost('nama_mata_kuliah'),
            'sks'              => $this->request->getPost('sks'),
        ]);

        return redirect()->to('/admin/matakuliah')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function delete($kode)
    {
        $model = new MataKuliahModel();
        if ($model->delete($kode)) {
            return redirect()->to('/admin/matakuliah')->with('success', 'Mata kuliah berhasil dihapus.');
        }

        return redirect()->to('/admin/matakuliah')->with('error', 'Gagal menghapus mata kuliah.');
    }
}
