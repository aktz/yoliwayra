<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/config', 'Config::index');

$routes->get('/accesos', 'Acceso::index');
$routes->post('/accesos/insert', 'Acceso::insert');
$routes->post('/accesos/update', 'Acceso::update');
$routes->post('/accesos/delete', 'Acceso::delete');

$routes->get('/alimentaciones', 'Alimentacion::index');
$routes->post('/alimentaciones/insert', 'Alimentacion::insert');
$routes->post('/alimentaciones/update', 'Alimentacion::update');
$routes->post('/alimentaciones/delete', 'Alimentacion::delete');

$routes->get('/alojamientos', 'Alojamiento::index');
$routes->post('/alojamientos/insert', 'Alojamiento::insert');
$routes->post('/alojamientos/update', 'Alojamiento::update');
$routes->post('/alojamientos/delete', 'Alojamiento::delete');

$routes->get('/autoridades', 'Autoridad::index');
$routes->post('/autoridades/insert', 'Autoridad::insert');
$routes->post('/autoridades/update', 'Autoridad::update');
$routes->post('/autoridades/delete', 'Autoridad::delete');

$routes->get('/bancos', 'Banco::index');
$routes->post('/bancos/insert', 'Banco::insert');
$routes->post('/bancos/update', 'Banco::update');
$routes->post('/bancos/delete', 'Banco::delete');

$routes->get('/categorias', 'Categoria::index');
$routes->post('/categorias/insert', 'Categoria::insert');
$routes->post('/categorias/update', 'Categoria::update');
$routes->post('/categorias/delete', 'Categoria::delete');

$routes->get('/ciudades', 'Ciudad::index');
$routes->post('/ciudades/insert', 'Ciudad::insert');
$routes->post('/ciudades/update', 'Ciudad::update');
$routes->post('/ciudades/delete', 'Ciudad::delete');

$routes->get('/ciudades_alimentacion', 'CiudadAlimentacion::index');
$routes->post('/ciudades_alimentacion/insert', 'CiudadAlimentacion::insert');
$routes->post('/ciudades_alimentacion/update', 'CiudadAlimentacion::update');
$routes->post('/ciudades_alimentacion/delete', 'CiudadAlimentacion::delete');

$routes->get('/climas', 'Clima::index');
$routes->post('/climas/insert', 'Clima::insert');
$routes->post('/climas/update', 'Clima::update');
$routes->post('/climas/delete', 'Clima::delete');

$routes->get('/divisas', 'Divisa::index');
$routes->post('/divisas/insert', 'Divisa::insert');
$routes->post('/divisas/update', 'Divisa::update');
$routes->post('/divisas/delete', 'Divisa::delete');

$routes->get('/embajadas', 'Embajada::index');
$routes->post('/embajadas/insert', 'Embajada::insert');
$routes->post('/embajadas/update', 'Embajada::update');
$routes->post('/embajadas/delete', 'Embajada::delete');

$routes->get('/idiomas', 'Idioma::index');
$routes->post('/idiomas/insert', 'Idioma::insert');
$routes->post('/idiomas/update', 'Idioma::update');
$routes->post('/idiomas/delete', 'Idioma::delete');

$routes->get('/indumentarias', 'Indumentaria::index');
$routes->post('/indumentarias/insert', 'Indumentaria::insert');
$routes->post('/indumentarias/update', 'Indumentaria::update');
$routes->post('/indumentarias/delete', 'Indumentaria::delete');

$routes->get('/paises', 'Pais::index');
$routes->post('/paises/insert', 'Pais::insert');
$routes->post('/paises/update', 'Pais::update');
$routes->post('/paises/delete', 'Pais::delete');

$routes->get('/paises_divisas', 'PaisDivisa::index');
$routes->post('/paises_divisas/insert', 'PaisDivisa::insert');
$routes->post('/paises_divisas/update', 'PaisDivisa::update');
$routes->post('/paises_divisas/delete', 'PaisDivisa::delete');

$routes->get('/estados', 'Estado::index');
$routes->post('/estados/insert', 'Estado::insert');
$routes->post('/estados/update', 'Estado::update');
$routes->post('/estados/delete', 'Estado::delete');

$routes->get('/perfiles', 'Perfil::index');
$routes->post('/perfiles/insert', 'Perfil::insert');
$routes->post('/perfiles/update', 'Perfil::update');
$routes->post('/perfiles/delete', 'Perfil::delete');

$routes->get('/regiones', 'Region::index');
$routes->post('/regiones/insert', 'Region::insert');
$routes->post('/regiones/update', 'Region::update');
$routes->post('/regiones/delete', 'Region::delete');
