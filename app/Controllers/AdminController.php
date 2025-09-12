<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
    public function edit_mahasiswa($nim)
    {
        return view('/admin/dashboard/edit');
    }
    public function list_mahasiswa(){
        return view('/admin/mahasiswa/index');
    }

}
