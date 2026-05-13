<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Mahasiswa::index');

$routes->get('mahasiswa', 'Mahasiswa::index');

$routes->get('mahasiswa/data', 'Mahasiswa::data');

$routes->post('mahasiswa/save', 'Mahasiswa::save');

$routes->post('mahasiswa/delete', 'Mahasiswa::delete');