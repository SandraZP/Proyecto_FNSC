<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


//How to declarate constant 
// define("NOMBRE_CONSTANTE", array("" => ''), 0 , '');
define("RECURSOS_LOGIN_JS", "recursos_login/login_v3/js/");
define("RECURSOS_LOGIN_CSS", "recursos_login/login_v3/css/");
define("RECURSOS_LOGIN_VENDOR", "recursos_login/login_v3/vendor/");
define("RECURSOS_LOGIN_FONTS", "recursos_login/login_v3/fonts/");
define("DIR_IMG", "images/");

//PANEL CONSTANTS
define('RECURSOS_PANEL_CSS', 'recursos_panel/css/');
define('RECURSOS_PANEL_JS', 'recursos_panel/js/');
define('RECURSOS_PANEL_PLUGINS', 'recursos_panel/plugins/');
define('RECURSOS_PANEL_IMG', 'recursos_panel/img/');
define('RECURSOS_PANEL_IMG_PROFILES_USER', 'images/profile_user/');

//PORTAL CONSTANS
// define('RECURSOS_PORTAL_', 'recursos_portal/');

//CONTANTES PARA EL SEXO
define('MASCULINO', 0);
define('FEMENINO', 1);


///ESTATUS USUARIO
define('ESTATUS_HABILITADO', 1);
define('ESTATUS_DESHABILITADO', 0);

//CONSTANTES ALERTAS
define('TOASTR_SUCCESS', 50);
define('TOASTR_WARNING', 100);
define('TOASTR_ERROR', 125);
define('TOASTR_INFO', 0);
define('TOASTR_DANGER',150);


///  AMINITRABLE : TAREA  ///
define('TAREA_DASHBOARD', "tarea_dashboard");

define('TAREA_USUARIOS', "tarea_usuarios");
    define('TAREA_USUARIO_NUEVO', "tarea_usuario_nuevo");

    ///TAREAS MATERIA -----------------------------------
    define('TAREA_MATERIAS', "tarea_materias");
    define('TAREA_MATERIA_NUEVA', "tarea_materia_nueva");

//-----------------------------------------------------------
//-----------------------PERIODOS------------------------------------
define('TAREA_PERIODOS', "tarea_periodos");
define('TAREA_PERIODO_NUEVO',"tarea_periodo_nuevo");

//------------------------Docente-----------------------------------

define('TAREA_DOCENTES', "tarea_docentes");
define('TAREA_DOCENTE_NUEVO', "tarea_docente_nuevo");
//----------------------------------------------------------------------

//-----------------------ASIGNACION DE MATERIAS-------------------------
define('TAREA_ASIGNACION_MATERIAS',"tarea_asignacion_materias");
define('TAREA_ASIGNACION_MATERIA_NUEVO',"tarea_asignacion_materia_nuevo");

//-----------------ASIGNACION DE AUMNOS --------------------------------
define('TAREA_ASIGNACION_ALUMNOS',"tarea_asignacion_alumnos");
define('TAREA_ASIGNACION_ALUMNO_NUEVO',"tarea_asignacion_alumno_nuevo");



///  PUBLICA : PAGINA  ///

//---------------------------
///    PERMISOS ROLES   ///
//-------------------------
define("PERMISOS_ADMINISTRADOR", array(
    TAREA_DASHBOARD,
    TAREA_USUARIOS,
    TAREA_USUARIO_NUEVO,

    ////------------MATERIAS------------------//
    TAREA_MATERIAS,
    TAREA_MATERIA_NUEVA,

    //-------------PERIODOS--------------------//
    TAREA_PERIODOS,
    TAREA_PERIODO_NUEVO,
    ///------------ASIGNACION MATERIAS------------//

    TAREA_ASIGNACION_MATERIAS,
    TAREA_ASIGNACION_MATERIA_NUEVO,
//----------------ASIGNACION ALUMNOS---------------//
    TAREA_ASIGNACION_ALUMNOS,
    TAREA_ASIGNACION_ALUMNO_NUEVO,
));

define("PERMISOS_OPERADOR", array(
    TAREA_DASHBOARD
));

//----------------|
///   ROLES   ///
//----------------
define("ROL_ADMINISTRADOR", array("clave" => 745 , "rol" => "Administrador"));
define("ROL_OPERADOR", array("clave" => 125 , "rol" => "Operador"));

define("ROLES", array(
    ROL_ADMINISTRADOR["clave"] => ROL_ADMINISTRADOR["rol"],
    ROL_OPERADOR["clave"] => ROL_OPERADOR["rol"],
));