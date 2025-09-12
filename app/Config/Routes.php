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
$routes->get('/admin/mahasiswa/create', 'AdminController::create_mahasiswa');
$routes->get('/admin/mahasiswa/edit/(:nim)', 'AdminController::edit_mahasiswa/$1');


// Routes mahasiswa
// view routes
$routes->get('/mahasiswa', "MahasiswaController::index");
$routes->get('/mahasiswa/dashboard', "MahasiswaController::index");
$routes->get('/mahasiswa/matakuliah', "MahasiswaController::mata_kuliah");
$routes->get('/mahasiswa/profile', "MahasiswaController::profile");