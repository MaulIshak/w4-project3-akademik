<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MahasiswaController extends BaseController
{

    // Views controller
    public function index()
    {
        $data['title'] = 'Dashboard Mahasiswa';
        return view('mahasiswa/dashboard', $data);
    }
    public function profile()
    {
        $data['title'] = 'Profil Mahasiswa';
        return view('mahasiswa/profile', $data);
    }
    public function mata_kuliah()
    {
        $data['title'] = 'Mata Kuliah';
        return view('mahasiswa/matakuliah', $data);
    }
}
