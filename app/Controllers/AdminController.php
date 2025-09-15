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
}
