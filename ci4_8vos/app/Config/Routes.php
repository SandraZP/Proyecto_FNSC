<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * Obtener datos o mostrar datos
 * $routes->get('nombreRuta', 'Controlador::funcion', ["as" => 'delimitador']);
 * 
 * Body Request
 * $routes->post('nombreRuta', 'Controlador::funcion', ["as" => 'delimitador']);
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('practica', 'Home::practica_uno', ['as' => '']);

//Login
$routes->get('administracion_acceso', 'Usuario/Login::index', ['as' => 'administracion_acceso']);
$routes->post('validar_usuario', 'Usuario/Login::existe_usuario', ["as" => 'validar_usuario']);
$routes->get('salir_admistracion_acceso', 'Usuario/Logout::index', ['as' => 'salir_admistracion_acceso']);



//Dashboard
$routes->get('administracion_dashbord', 'Panel/Dashboard::index', ['as' => 'administracion_dashbord']);

//Dashboard
//************************************************************************************************************ */
//----------------------------------------------USUARIOS--------------------------------------------------------/
$routes->get('administracion_usuarios', 'Panel\Usuarios::index', ['as' => 'administracion_usuarios']);
$routes->get('usuario_nuevo', 'Panel/Usuario_nuevo::index', ['as' => 'usuario_nuevo']);
$routes->post('registrar_usuario', 'Panel/Usuario_nuevo::registrar', ['as' => 'registrar_usuario']);
$routes->get('detalles_usuario/(:num)', 'Panel/Usuario_detalles::index/$1', ['as' => 'detalles_usuario']);

$routes->post('editar_usuario/(:num)', 'Panel/Usuario_detalles::actualizar/$1', ['as' => 'editar_usuario']);
$routes->get('estatus_usuario/(:num)/(:num)', 'Panel/Usuarios::estatus/$1/$2', ['as' => 'estatus_usuario']);
$routes->get('eliminar_usuario/(:num)', 'Panel/Usuarios::eliminar/$1', ['as' => 'eliminar_usuario']);
//=============================================================================================================/



//===============================================DOCENTES=======================================================/
$routes->get('administracion_docentes', 'Panel/Docentes::index', ['as' => 'administracion_docentes']);
$routes->get('docente_nuevo', 'Panel/Docente_nuevo::index', ['as' => 'docente_nuevo']);
$routes->post('registrar_docente', 'Panel/Docente_nuevo::registrar', ['as' => 'registrar_docente']);

$routes->get('detalles_docente/(:num)', 'Panel/Docente_detalles::index/$1', ['as' => 'detalles_docente']);
$routes->post('editar_docente/(:num)', 'Panel/Docente_detalles::actualizar/$1', ['as' => 'editar_docente']);
$routes->get('estatus_docente/(:num)/(:num)', 'Panel/Docentes::estatus/$1/$2', ['as' => 'estatus_docente']);
$routes->get('eliminar_docente/(:num)', 'Panel/Docentes::eliminar/$1', ['as' => 'eliminar_docente']);
//=====================================================================================================================================//



//=======================================MATERIAS==============================================================/

$routes->get('administracion_materias', 'Panel/Materias::index', ['as' => 'administracion_materias']);
$routes->get('materia_nueva', 'Panel/Materia_nueva::index', ['as' => 'materia_nueva']);
$routes->post('registrar_materia', 'Panel/Materia_nueva::registrar', ['as' => 'registrar_materia']);
$routes->get('detalles_materia/(:num)', 'Panel/Materia_detalles::index/$1', ['as' => 'detalles_materia']);

$routes->post('editar_materia/(:num)', 'Panel/Materia_detalles::actualizar/$1', ['as' => 'editar_materia']);
$routes->get('estatus_materia/(:num)/(:num)', 'Panel/Materias::estatus/$1/$2', ['as' => 'estatus_materia']);
$routes->get('eliminar_materia/(:num)', 'Panel/Materias::eliminar/$1', ['as' => 'eliminar_materia']);
//============================================================================================================/


//=============================================PERIODOS=======================================================/
// Rutas para la administración de periodos
$routes->get('administracion/periodos', 'Panel/Periodos::index', ['as' => 'administracion_periodos']);
$routes->get('administracion/periodo/nuevo', 'Panel/Periodo_nuevo::index', ['as' => 'periodo_nuevo']);
$routes->post('administracion/periodo/registrar', 'Panel/Periodo_nuevo::registrar', ['as' => 'registrar_periodo']);
$routes->get('administracion/periodo/detalles/(:num)', 'Panel/Periodo_detalles::index/$1', ['as' => 'detalles_periodo']);

$routes->post('administracion/periodo/editar/(:num)', 'Panel/Periodo_detalles::actualizar/$1', ['as' => 'editar_periodo']);
$routes->get('administracion/periodo/estatus/(:num)/(:num)', 'Panel/Periodos::estatus/$1/$2', ['as' => 'estatus_periodo']);
$routes->get('administracion/periodo/eliminar/(:num)', 'Panel/Periodos::eliminar/$1', ['as' => 'eliminar_periodo']);


//==============================================================================================================/



//=======================================================ASIGNACION DE MATERIAS========================================================//
$routes->get('administracion_asignacion_materias', 'Panel/Asignacion_materias::index', ['as' => 'administracion_asignacion_materias']);
$routes->get('asignacion_materia_nuevo', 'Panel/Asignacion_materia_nuevo::index', ['as' => 'asignacion_materias_nuevo']);
$routes->post('registrar_asignacion_materia', 'Panel/Asignacion_materia_nuevo::registrar', ['as' => 'registrar_asignacion_materia']);
$routes->get('detalles_asignacion_materia/(:num)', 'Panel/Asignacion_materia_detalles::index/$1', ['as' => 'detalles_asignacion_materia']);
$routes->post('editar_asignacion_materia/(:num)', 'Panel/Asignacion_materia_detalles::actualizar/$1', ['as' => 'editar_asignacion_materia']);
$routes->get('estatus_asignacion_materia/(:num)/(:num)', 'Panel/Asignacion_materias::estatus/$1/$2', ['as' => 'estatus_asignacion_materia']);
$routes->get('eliminar_asignacion_materia/(:num)', 'Panel/Asignacion_materias::eliminar/$1', ['as' => 'eliminar_asignacion_materia']);
//=====================================================================================================================================//


//=======================================================ASIGNACION DE ALUMNOS========================================================//
$routes->get('administracion_asignacion_alumnos', 'Panel/Asignacion_alumnos::index', ['as' => 'administracion_asignacion_alumnos']);
$routes->get('asignacion_alumno_nuevo', 'Panel/Asignacion_alumno_nuevo::index', ['as' => 'asignacion_alumnos_nuevo']);
$routes->post('registrar_asignacion_alumno', 'Panel/Asignacion_alumno_nuevo::registrar', ['as' => 'registrar_asignacion_alumno']);
$routes->get('detalles_asignacion_alumno/(:num)', 'Panel/Asignacion_alumno_detalles::index/$1', ['as' => 'detalles_asignacion_alumno']);
$routes->post('editar_asignacion_alumno/(:num)', 'Panel/Asignacion_alumno_detalles::actualizar/$1', ['as' => 'editar_asignacion_alumno']);
$routes->get('estatus_asignacion_alumno/(:num)/(:num)', 'Panel/Asignacion_alumnos::estatus/$1/$2', ['as' => 'estatus_asignacion_alumno']);
$routes->get('eliminar_asignacion_alumno/(:num)', 'Panel/Asignacion_alumnos::eliminar/$1', ['as' => 'eliminar_asignacion_alumno']);
//=====================================================================================================================================//


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
