<?php

namespace App\Controllers\Panel;
use App\Controllers\BaseController;

class Materias extends BaseController {

    private $view = 'panel/materias';

    private $session = NULL;
    private $permiso = TRUE;

    public function __construct(){
        //Intancia de la variable de sesion
        $this->session = session();

        //Instancia del permisos helper
        helper("permisos_roles_helper");

        if (!acceso_usuario(TAREA_MATERIAS, $this->session->rol_actual)) {
            $this->permiso = FALSE;
        }//end 

        $this->session->tarea_actual = TAREA_MATERIAS;
    }//end __construct

    private function cargar_datos(){
        $datos = array();

        //----------
        // Configuracion Básica
        //----------
        $datos['nombre_pagina'] = 'Materias | CI4Base';
        $datos['titulo_pagina'] = 'Materias';
        
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
                'titulo' => 'Materias',
            )
        );

        $datos['breadcrumb_panel'] = breadcrumb_panel($datos['titulo_pagina'], $breadcrumb);
        //----------
        // Peticiones SQL
        //----------
        $tabla_materias = new \App\Models\Tabla_materias;

        $datos["materias"] =  $tabla_materias->get_asignaturas();
        
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
   /* public function estatus($idAsignatura = 0, $estatus = FALSE){
        //Instancia del modelo Usuario
        $tabla_materias = new \App\Models\Tabla_materias;
        if ($tabla_materias->find($idAsignatura) != null) {
            //---------------------
            //    UPDATE Usuario
            //---------------------
            if ($tabla_materias->update_data($idAsignatura, ["estatus_materia" => $estatus])) {
                crear_mensaje("El estatus de la materia ha sido actualizado", "¡Estatus actualizado!", TOASTR_SUCCESS);
            }//ende if
            else{
                crear_mensaje("Ocurrio un error al actualizar el estatus de la materia", "¡Error al Actualizar!", TOASTR_DANGER);
            }//end else
        }//end if
        else{
            crear_mensaje("La materia no ha sido encontrado", "¡Oppss!", TOASTR_WARNING);
        }//end else
        return redirect()->to(route_to("administracion_materias"));
    }//end estatus*/

    public function eliminar($idAsignatura = 0){
        //Instancia del modelo Usuario
        $tabla_materias = new \App\Models\Tabla_materias;
        if ($tabla_materias->find($idAsignatura) != null) {
            if ($tabla_materias->delete_data($idAsignatura)) {
                crear_mensaje("La materia ha sido eliminado de manera correcta", "¡Materia eliminada!", TOASTR_SUCCESS);
            }//end if
            else{
                crear_mensaje("Error al eliminar esta materia", "¡Error al eliminar!!", TOASTR_DANGER);
            }//end else
        }//end if
        else{
            crear_mensaje("La materia que solicitas no se encuentra en la BD", "Oppss!", TOASTR_WARNING);
        }//end else
        return redirect()->to(route_to("administracion_materias"));
    }//end eliminar

}//end Home
