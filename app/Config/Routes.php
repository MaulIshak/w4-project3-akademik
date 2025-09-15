<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// --- AUTHENTICATION ROUTES ---
$routes->group('auth', static function ($routes) {
    $routes->get('login', 'AuthController::index', ['as' => 'login.form']);
    $routes->post('login', 'AuthController::login', ['as' => 'login.attempt']);
    $routes->post('logout', 'AuthController::logout', ['as' => 'logout']);
});

// --- ADMIN ROUTES ---
$routes->group('admin', ['filter' => 'auth:admin'], static function ($routes) {
    $routes->get('/', 'AdminController::index'); 
    $routes->get('dashboard', 'AdminController::index');

    // Mahasiswa CRUD
    $routes->group('mahasiswa', static function ($routes) {
        $routes->get('/', 'MahasiswaController::index', ['as' => 'admin.mahasiswa']);
        $routes->get('create', 'MahasiswaController::create', ['as' => 'admin.mahasiswa.create']);
        $routes->post('store', 'MahasiswaController::store', ['as' => 'admin.mahasiswa.store']);
        $routes->get('detail/(:segment)', 'MahasiswaController::detail/$1', ['as' => 'admin.mahasiswa.detail']);
        $routes->get('edit/(:segment)', 'MahasiswaController::edit/$1', ['as' => 'admin.mahasiswa.edit']);
        $routes->put('update/(:segment)', 'MahasiswaController::update/$1', ['as' => 'admin.mahasiswa.update']);
        $routes->delete('delete/(:segment)', 'MahasiswaController::delete/$1', ['as' => 'admin.mahasiswa.delete']);
    });

    // Mata Kuliah CRUD
    $routes->group('matakuliah', static function ($routes) {
        $routes->get('/', 'MataKuliahController::index', ['as' => 'admin.matakuliah']);
        $routes->get('create', 'MataKuliahController::create', ['as' => 'admin.matakuliah.create']);
        $routes->post('store', 'MataKuliahController::store', ['as' => 'admin.matakuliah.store']);
        $routes->get('detail/(:segment)', 'MataKuliahController::detail/$1', ['as' => 'admin.matakuliah.detail']);
        $routes->get('edit/(:segment)', 'MataKuliahController::edit/$1', ['as' => 'admin.matakuliah.edit']);
        $routes->put('update/(:segment)', 'MataKuliahController::update/$1', ['as' => 'admin.matakuliah.update']);
        $routes->delete('delete/(:segment)', 'MataKuliahController::delete/$1', ['as' => 'admin.matakuliah.delete']);
    });
});

// --- MAHASISWA ROUTES ---
$routes->group('mahasiswa', ['filter' => 'auth:mahasiswa'], static function ($routes) {
    $routes->get('/', 'UserController::index');
    $routes->get('dashboard', 'UserController::index', ['as' => 'mahasiswa.dashboard']);
    $routes->get('profile', 'UserController::profile', ['as' => 'mahasiswa.profile']);
    $routes->post('profile/update-password', 'UserController::update_password', ['as' => 'mahasiswa.password.update']);

    $routes->get('matakuliah', 'UserController::mata_kuliah', ['as' => 'mahasiswa.matakuliah']);
    $routes->post('matakuliah/ambil', 'UserController::ambil_mata_kuliah', ['as' => 'mahasiswa.matakuliah.ambil']);
    $routes->delete('matakuliah/batal', 'UserController::hapus_mata_kuliah', ['as' => 'mahasiswa.matakuliah.batal']);
});
