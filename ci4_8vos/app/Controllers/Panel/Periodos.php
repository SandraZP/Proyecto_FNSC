<?php

namespace App\Controllers\Panel;
use App\Controllers\BaseController;

class Periodos extends BaseController {

    private $view = 'panel/periodos';

    private $session = NULL;
    private $permiso = TRUE;

    public function __construct(){
        //Intancia de la variable de sesion
        $this->session = session();

        //Instancia del permisos helper
        helper("permisos_roles_helper");

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
        $datos['nombre_pagina'] = 'Periodos | CI4Base';
        $datos['titulo_pagina'] = 'Periodos';
        
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
            // array(
            //     'href' => route_to("administracion_dashbord"),
            //     'titulo' => 'Materias',
            // ),
            array(
                'href' => '#',
                'titulo' => 'Periodos',
            )
        );

        $datos['breadcrumb_panel'] = breadcrumb_panel($datos['titulo_pagina'], $breadcrumb);
        //----------
        // Peticiones SQL
        //----------
        $tabla_periodos = new \App\Models\Tabla_periodos;

        $datos["periodos"] =  $tabla_periodos->get_periodos();
        
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

    ////
    public function estatus($idperiodo= 0, $estatus = FALSE){
        //Instancia del modelo Usuario
        $tabla_periodos = new \App\Models\Tabla_periodos;
        if ($tabla_periodos->find($idperiodo) != null) {
            //---------------------
            //    UPDATE Usuario
            //---------------------
            if ($tabla_periodos->update_data($idperiodo, ["estatus_periodo" => $estatus])) {
                crear_mensaje("El estatus de la materia ha sido actualizado", "¡Estatus actualizado!", TOASTR_SUCCESS);
            }//ende if
            else{
                crear_mensaje("Ocurrio un error al actualizar el estatus de la materia", "¡Error al Actualizar!", TOASTR_DANGER);
            }//end else
        }//end if
        else{
            crear_mensaje("La materia no ha sido encontrado", "¡Oppss!", TOASTR_WARNING);
        }//end else
        return redirect()->to(route_to("administracion_periodos"));
    }//end estatus

    public function eliminar($idperiodo = 0){
        //Instancia del modelo Usuario
        $tabla_periodos = new \App\Models\Tabla_periodos;
        if ($tabla_periodos->find($idperiodo) != null) {
            if ($tabla_periodos->delete_data($idperiodo)) {
                crear_mensaje("La materia ha sido eliminado de manera correcta", "¡Materia eliminada!", TOASTR_SUCCESS);
            }//end if
            else{
                crear_mensaje("Error al eliminar esta materia", "¡Error al eliminar!!", TOASTR_DANGER);
            }//end else
        }//end if
        else{
            crear_mensaje("La materia que solicitas no se encuentra en la BD", "Oppss!", TOASTR_WARNING);
        }//end else
        return redirect()->to(route_to("administracion_periodos"));
    }//end eliminar

}//end Home
