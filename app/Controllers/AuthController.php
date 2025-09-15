<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        // Jika sudah login, redirect ke dashboard yang sesuai
        if (session()->get('isLoggedIn')) {
            if (session()->get('role') === 'admin') {
                return redirect()->to('/admin/dashboard');
            }
            if (session()->get('role') === 'mahasiswa') {
                return redirect()->to('/mahasiswa/dashboard');
            }
        }

        $data['title'] = 'Login';
        return view('auth/login', $data);
    }

    public function login()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $user = $model->where('username', $this->request->getVar('username'))->first();

        if (!$user || !password_verify($this->request->getVar('password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
        }

        // Set session data
        $this->setUserSession($user);

        // Redirect based on role
        if ($user['role'] == 'admin') {
            return redirect()->to('/admin/dashboard');
        }
        
        return redirect()->to('/mahasiswa/dashboard');
    }

    private function setUserSession($user)
    {
        $data = [
            'user_id'    => $user['user_id'],
            'username'   => $user['username'],
            'role'       => $user['role'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'Anda berhasil logout.');
    }
}
