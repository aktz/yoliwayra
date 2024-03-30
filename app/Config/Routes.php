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

$routes->get('/ciudades_alimentaciones', 'CiudadAlimentacion::index');
$routes->post('/ciudades_alimentaciones/insert', 'CiudadAlimentacion::insert');
$routes->post('/ciudades_alimentaciones/update', 'CiudadAlimentacion::update');
$routes->post('/ciudades_alimentaciones/delete', 'CiudadAlimentacion::delete');

$routes->get('/ciudades_alojamientos', 'CiudadAlojamiento::index');
$routes->post('/ciudades_alojamientos/insert', 'CiudadAlojamiento::insert');
$routes->post('/ciudades_alojamientos/update', 'CiudadAlojamiento::update');
$routes->post('/ciudades_alojamientos/delete', 'CiudadAlojamiento::delete');

$routes->get('/ciudades_bancos', 'CiudadBanco::index');
$routes->post('/ciudades_bancos/insert', 'CiudadBanco::insert');
$routes->post('/ciudades_bancos/update', 'CiudadBanco::update');
$routes->post('/ciudades_bancos/delete', 'CiudadBanco::delete');

$routes->get('/ciudades_embajadas', 'CiudadEmbajada::index');
$routes->post('/ciudades_embajadas/insert', 'CiudadEmbajada::insert');
$routes->post('/ciudades_embajadas/update', 'CiudadEmbajada::update');
$routes->post('/ciudades_embajadas/delete', 'CiudadEmbajada::delete');

$routes->get('/ciudades_terminales', 'CiudadTerminal::index');
$routes->post('/ciudades_terminales/insert', 'CiudadTerminal::insert');
$routes->post('/ciudades_terminales/update', 'CiudadTerminal::update');
$routes->post('/ciudades_terminales/delete', 'CiudadTerminal::delete');

$routes->get('/ciudades_transportes', 'CiudadTransporte::index');
$routes->post('/ciudades_transportes/insert', 'CiudadTransporte::insert');
$routes->post('/ciudades_transportes/update', 'CiudadTransporte::update');
$routes->post('/ciudades_transportes/delete', 'CiudadTransporte::delete');

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

$routes->get('/lugares', 'Lugar::index');
$routes->post('/lugares/insert', 'Lugar::insert');
$routes->post('/lugares/update', 'Lugar::update');
$routes->post('/lugares/delete', 'Lugar::delete');

$routes->get('/lugares_accesos/(:num)', 'LugarAcceso::index/$1');
$routes->post('/lugares_accesos/insert', 'LugarAcceso::insert');
$routes->post('/lugares_accesos/update', 'LugarAcceso::update');
$routes->post('/lugares_accesos/delete', 'LugarAcceso::delete');

$routes->get('/paises', 'Pais::index');
$routes->post('/paises/insert', 'Pais::insert');
$routes->post('/paises/update', 'Pais::update');
$routes->post('/paises/delete', 'Pais::delete');

$routes->get('/paises_divisas', 'PaisDivisa::index');
$routes->post('/paises_divisas/insert', 'PaisDivisa::insert');
$routes->post('/paises_divisas/update', 'PaisDivisa::update');
$routes->post('/paises_divisas/delete', 'PaisDivisa::delete');

$routes->get('/paises_idiomas', 'PaisIdioma::index');
$routes->post('/paises_idiomas/insert', 'PaisIdioma::insert');
$routes->post('/paises_idiomas/update', 'PaisIdioma::update');
$routes->post('/paises_idiomas/delete', 'PaisIdioma::delete');

$routes->get('/paises_requerimientos', 'PaisRequerimiento::index');
$routes->post('/paises_requerimientos/insert', 'PaisRequerimiento::insert');
$routes->post('/paises_requerimientos/update', 'PaisRequerimiento::update');
$routes->post('/paises_requerimientos/delete', 'PaisRequerimiento::delete');

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

$routes->get('/requerimientos', 'Requerimiento::index');
$routes->post('/requerimientos/insert', 'Requerimiento::insert');
$routes->post('/requerimientos/update', 'Requerimiento::update');
$routes->post('/requerimientos/delete', 'Requerimiento::delete');

$routes->get('/terminales', 'Terminal::index');
$routes->post('/terminales/insert', 'Terminal::insert');
$routes->post('/terminales/update', 'Terminal::update');
$routes->post('/terminales/delete', 'Terminal::delete');

$routes->get('/transportes', 'Transporte::index');
$routes->post('/transportes/insert', 'Transporte::insert');
$routes->post('/transportes/update', 'Transporte::update');
$routes->post('/transportes/delete', 'Transporte::delete');
