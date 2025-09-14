<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// Routes auth
// view routes
$routes->get('/auth/login', 'AuthController::index');

// Routes admin
// view routes
$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/dashboard', 'AdminController::index');
$routes->get('/admin/mahasiswa', 'AdminController::list_mahasiswa');
$routes->get('/admin/mahasiswa/detail/(:segment)', 'AdminController::detail_mahasiswa/$1');
$routes->get('/admin/mahasiswa/create', 'AdminController::create_mahasiswa');
$routes->get('/admin/mahasiswa/edit', 'AdminController::edit_mahasiswa');
$routes->get('/admin/matakuliah', 'AdminController::mata_kuliah');
$routes->get('/admin/matakuliah/detail/(:segment)', 'AdminController::detail_mata_kuliah/$1');
$routes->get('/admin/matakuliah/edit', 'AdminController::edit_mata_kuliah');

// db routes
$routes->post('/admin/mahasiswa/store', 'AdminController::store_mahasiswa');

// Routes mahasiswa
// view routes
$routes->get('/mahasiswa', "MahasiswaController::index");
$routes->get('/mahasiswa/dashboard', "MahasiswaController::index");
$routes->get('/mahasiswa/matakuliah', "MahasiswaController::mata_kuliah");
$routes->get('/mahasiswa/profile', "MahasiswaController::profile");