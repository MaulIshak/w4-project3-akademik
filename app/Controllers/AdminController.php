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
        return view('/admin/dashboard');
    }
    public function create_mahasiswa()
    {
        return view('/admin/mahasiswa/create');
    }
    public function edit_mahasiswa()
    {
        return view('/admin/mahasiswa/edit');
    }
    public function tambah_mahasiswa()
    {
        return view('/admin/mahasiswa/create');
    }

    public function list_mahasiswa(){
        $model = new MahasiswaModel();
        
        $data['mahasiswa'] = $model->getMahasiwa();

        return view('/admin/mahasiswa/index', $data);
    }

    public function detail_mahasiswa(){
        return view('/admin/mahasiswa/detail');
    }

    public function mata_kuliah(){
        return view('/admin/matakuliah/index');
    }
    public function detail_mata_kuliah(){
        return view('/admin/matakuliah/detail');
    }
    public function edit_mata_kuliah(){
        return view('/admin/matakuliah/edit');
    }
    public function tambah_mata_kuliah(){
        return view('/admin/matakuliah/create');
    }

}
