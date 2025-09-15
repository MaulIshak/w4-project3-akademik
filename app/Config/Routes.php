<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// Routes auth
$routes->get('/auth/login', 'AuthController::index');
$routes->post('/auth/login', 'AuthController::login');
$routes->post('/auth/logout', 'AuthController::logout');

// Admin Routes Group (Protected by JWT Filter for 'admin' role)
$routes->group('admin', ['filter' => 'jwt:admin'], static function ($routes) {
    // view routes
    $routes->get('/', 'AdminController::index');
    $routes->get('dashboard', 'AdminController::index');
    $routes->get('mahasiswa', 'AdminController::list_mahasiswa');
    $routes->get('mahasiswa/detail/(:segment)', 'AdminController::detail_mahasiswa/$1');
    $routes->get('mahasiswa/create', 'AdminController::create_mahasiswa');
    $routes->get('mahasiswa/edit/(:segment)', 'AdminController::edit_mahasiswa/$1');
    $routes->get('matakuliah', 'AdminController::mata_kuliah');
    $routes->get('matakuliah/create', 'AdminController::create_mata_kuliah');
    $routes->get('matakuliah/detail/(:segment)', 'AdminController::detail_mata_kuliah/$1');
    $routes->get('matakuliah/edit', 'AdminController::edit_mata_kuliah');

    // db routes
    // Mahasiswa
    $routes->post('mahasiswa/store', 'AdminController::store_mahasiswa');
    $routes->put('mahasiswa/update/(:segment)', 'AdminController::update_mahasiswa/$1');
    $routes->delete('mahasiswa/delete/(:segment)', 'AdminController::delete_mahasiswa/$1');

    // Mata kuliah
    $routes->post('matakuliah/store', 'AdminController::store_mata_kuliah');

});

// Mahasiswa Routes Group (Protected by JWT Filter for 'mahasiswa' role)
$routes->group('mahasiswa', ['filter' => 'jwt:mahasiswa'], static function ($routes) {
    // view routes
    $routes->get('/', "MahasiswaController::index");
    $routes->get('dashboard', "MahasiswaController::index");
    $routes->get('matakuliah', "MahasiswaController::mata_kuliah");
    $routes->get('profile', "MahasiswaController::profile");
    $routes->post('matakuliah/ambil', "MahasiswaController::ambil_mata_kuliah");
    $routes->delete('matakuliah/batal', "MahasiswaController::hapus_mata_kuliah");
});