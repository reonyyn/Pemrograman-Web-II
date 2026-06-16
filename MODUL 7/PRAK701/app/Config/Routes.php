<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/proses-login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Home::index');

$routes->get('/member', 'Member::index');
$routes->get('/member/form', 'Member::form');
$routes->get('/member/form/(:num)', 'Member::form/$1');
$routes->post('/member/save', 'Member::save');
$routes->get('/member/delete/(:num)', 'Member::delete/$1');

$routes->get('/buku', 'Buku::index');
$routes->match(['GET', 'POST'], '/buku/form', 'Buku::form');
$routes->match(['GET', 'POST'], '/buku/form/(:num)', 'Buku::form/$1');
$routes->get('/buku/delete/(:num)', 'Buku::delete/$1');

$routes->get('/peminjaman', 'Peminjaman::index');
$routes->get('/peminjaman/form', 'Peminjaman::form');
$routes->get('/peminjaman/form/(:num)', 'Peminjaman::form/$1');
$routes->post('/peminjaman/save', 'Peminjaman::save');
$routes->get('/peminjaman/delete/(:num)', 'Peminjaman::delete/$1');
$routes->get('/peminjaman/kembalikan/(:num)', 'Peminjaman::kembalikan/$1');