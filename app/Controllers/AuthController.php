<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController extends BaseController
{
    // Menggunakan property $helpers lebih bersih daripada memanggil helper() berulang kali
    protected $helpers = ['cookie'];

    public function index()
    {
        // Jika sudah login, redirect ke dashboard yang sesuai
        if (get_cookie('jwt_token')) {
            try {
                $key = getenv('JWT_SECRET_KEY');
                $decoded = JWT::decode(get_cookie('jwt_token'), new Key($key, 'HS256'));
                if ($decoded->role === 'admin') {
                    return redirect()->to('/admin/dashboard');
                }
                if ($decoded->role === 'mahasiswa') {
                    return redirect()->to('/mahasiswa/dashboard');
                }
            } catch (\Exception $e) {
                // Token tidak valid, hapus cookie yang salah dan lanjutkan ke halaman login
                delete_cookie('jwt_token');
            }
        }

        $data['title'] = 'Login';
        return view('/auth/login', $data);
    }

    public function login()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[8]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/auth/login')->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $user = $model->where('username', $this->request->getVar('username'))->first();

        if (!$user) {
            return redirect()->to('/auth/login')->with('error', 'Username tidak ditemukan.');
        }

        if (!password_verify($this->request->getVar('password'), $user['password'])) {
            return redirect()->to('/auth/login')->with('error', 'Password salah.');
        }

        // Generate JWT
        $key = getenv('JWT_SECRET_KEY');
        $iat = time(); // issued at
        $exp = $iat + (int)getenv('JWT_EXPIRATION'); // expiration time

        $payload = array(
            "iss" => "Akademik Polban",
            "aud" => "User Akademik",
            "iat" => $iat,
            "exp" => $exp,
            "user_id" => $user['user_id'],
            "username" => $user['username'],
            "role" => $user['role']
        );

        $token = JWT::encode($payload, $key, 'HS256');

        // --- PERUBAHAN UTAMA DI SINI ---
        // Menggunakan Response Object untuk mengatur cookie.
        // Metode ini secara otomatis akan mengambil pengaturan dari app/Config/Cookie.php
        // seperti 'domain', 'path', 'secure', 'httponly', dll.
        $this->response->setCookie('jwt_token', $token, $exp);

        // Redirect based on role
        if ($user['role'] == 'admin') {
            // Kita perlu mengembalikan response object agar cookie terkirim
            return redirect()->to('/admin/dashboard')->withCookies();
        } else {
            return redirect()->to('/mahasiswa/dashboard')->withCookies();
        }
    }

    public function logout()
    {
        // Menghapus cookie melalui response object juga merupakan praktik yang baik
        $this->response->deleteCookie('jwt_token');
        return redirect()->to('/auth/login')->with('success', 'Anda berhasil logout.')->withCookies();
    }
}
