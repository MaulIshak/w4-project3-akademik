<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MahasiswaController extends BaseController
{

    // Views controller
    public function index()
    {
        return view('mahasiswa/dashboard');
    }
    public function profile()
    {
        return view('mahasiswa/profile');
    }
    public function mata_kuliah()
    {
        return view('mahasiswa/matakuliah');
    }
}
