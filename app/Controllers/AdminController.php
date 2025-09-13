<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
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

    public function detail_mahasiswa(){
        $data['title'] = 'Detail Mahasiswa';
        return view('/admin/mahasiswa/detail' ,$data);
    }

    public function mata_kuliah(){
        $data['title'] = 'Daftar Mata Kuliah';
        return view('/admin/matakuliah/index', $data);
    }
    public function detail_mata_kuliah(){
        $data['title'] = 'Detail Mata Kuliah';
        return view('/admin/matakuliah/detail', $data);
    }
    public function edit_mata_kuliah(){
        $data['title'] = 'Edit Mata Kuliah';
        return view('/admin/matakuliah/edit', $data);
    }
    public function tambah_mata_kuliah(){
        $data['title'] = 'Tambah Mata Kuliah';
        return view('/admin/matakuliah/create', $data);
    }

}
