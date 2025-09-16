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
    
    public function index()
    {
        $mahasiswaModel = new MahasiswaModel();
        $mataKuliahModel = new MataKuliahModel();

        $data = [
            'title' => 'Dashboard Admin',
            'jumlah_mahasiswa' => $mahasiswaModel->countAllResults(),
            'jumlah_mata_kuliah' => $mataKuliahModel->countAllResults(),
            'mahasiswa_tanpa_mk' => $mahasiswaModel->getMahasiswaTanpaMatkul(),
        ];
        return view('/admin/dashboard', $data);
    }
}
