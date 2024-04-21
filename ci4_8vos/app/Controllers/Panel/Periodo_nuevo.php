<?php

namespace App\Controllers\Panel;
use App\Controllers\BaseController;

class Periodo_nuevo extends BaseController {

    private $view = 'panel/periodo_nuevo';

    private $session = NULL;
    private $permiso = TRUE;

    public function __construct(){
        //Intancia de la variable de sesion
        $this->session = session();

        //Instancia del permisos helper
        helper("permisos_roles_helper");
        helper("html");
        if (!acceso_usuario(TAREA_PERIODOS, $this->session->rol_actual)) {
            $this->permiso = FALSE;
        }//end 

        $this->session->tarea_actual = TAREA_PERIODOS;
    }//end __construct

    private function cargar_datos(){
        $datos = array();

        //----------
        // Configuracion Básica
        //----------
        $datos['nombre_pagina'] = 'Periodo Nuevo | CI4Base';
        $datos['titulo_pagina'] = 'Periodo Nuevo';
        
        // _______________________________
        // INFORMACIÓN DE INICIO DE SESION
        // _______________________________
        $datos["nombre_completo_usuario"] = $this->session->nombre_completo;
        $datos["nombre_usuario"] = $this->session->nombre_usuario;
        $datos["email_usuario"] = $this->session->email_usuario;
        $datos["imagen_usuario"] = ($this->session->imagen_usuario == NULL) 
                                    ? (($this->session->sexo_usuario != MASCULINO) ? 'icon-woman.png' : 'icon-man.png' ) 
                                    : $this->session->imagen_usuario;

        //----------
        // Breadcrumb
        //----------
        $breadcrumb = array(
            array(
                'href' => route_to("administracion_peridos"),
                'titulo' => 'Periodos',
            ),
            array(
                'href' => '#',
                'titulo' => 'Nuevo',
            )
        );

        $datos['breadcrumb_panel'] = breadcrumb_panel($datos['titulo_pagina'], $breadcrumb);
        //----------
        // Peticiones SQL
        //----------

        return $datos;
    }//en cargar_datos

    private function crear_vista($nombre_vista = '', $contenido = array()){
        $contenido["menu_lateral"] = crear_menu_panel($this->session->tarea_actual, $this->session->rol_actual);
        return view($nombre_vista, $contenido);
    }//end crear_vista

    //Función Principal
    public function index() {
        if ($this->permiso) {
            return $this->crear_vista($this->view, $this->cargar_datos());
        }//end if
        else{
            crear_mensaje("No tienes permisos para acceder a este módulo, contancte al Administrador", "Oppss!", TOASTR_WARNING);
            return redirect()->to(route_to("administracion_acceso"));
        }//
        
    }//end index
    
    /////

    public function  registrar(){
        d('Registrando....');

        //Arreglo Temporal
        $usuario = array();
        // $usuario["attributoDB"] = $this->request->getPost("nameFileHTML");

    
        $periodo["nombreperiodo"] = $this->request->getPost("nombreperiodo");
        $periodo["acronimo"] = $this->request->getPost("acronimo");
        $periodo["fecha_inicio"] = $this->request->getPost("fecha_inicio");
        $periodo["fecha_fin"] = $this->request->getPost("fecha_fin");
        $usuario["estatus_usuario"] = ESTATUS_HABILITADO;
        // dd($usuario);

        $tabla_periodos = new \App\Models\Tabla_periodos;


        if($tabla_periodos->create_data($periodo) > 0){
            crear_mensaje("El usuario ha sido registrado de manera éxitosa", "¡Petición éxitosa!", TOASTR_SUCCESS);
            return redirect()->to(route_to("administracion_periodos"));
        }//end
        else{
            crear_mensaje("Hubo un error al registrar al usuario", "¡Error Interno!", TOASTR_DANGER);
            return $this->index(); 
        }//end 

    }
}//end Home
