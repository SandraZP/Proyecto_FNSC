<?php

namespace App\Controllers\Panel;
use App\Controllers\BaseController;

class Usuarios extends BaseController {

    private $view = 'panel/usuarios';

    private $session = NULL;
    private $permiso = TRUE;

    public function __construct(){
        //Intancia de la variable de sesion
        $this->session = session();

        //Instancia del permisos helper
        helper("permisos_roles_helper");

        if (!acceso_usuario(TAREA_USUARIOS, $this->session->rol_actual)) {
            $this->permiso = FALSE;
        }//end 

        $this->session->tarea_actual = TAREA_USUARIOS;
    }//end __construct

    private function cargar_datos(){
        $datos = array();

        //----------
        // Configuracion Básica
        //----------
        $datos['nombre_pagina'] = 'Usuarios | CI4Base';
        $datos['titulo_pagina'] = 'Usuarios';
        
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
            //     'titulo' => 'Usuarios',
            // ),
            array(
                'href' => '#',
                'titulo' => 'Usuarios',
            )
        );

        $datos['breadcrumb_panel'] = breadcrumb_panel($datos['titulo_pagina'], $breadcrumb);
        //----------
        // Peticiones SQL
        //----------
        $tabla_usuarios = new \App\Models\Tabla_usuarios;

        $datos["usuarios"] =  $tabla_usuarios->get_table();
        
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
    public function estatus($id_usuario = 0, $estatus = FALSE){
        //Instancia del modelo Usuario
        $tabla_usuarios = new \App\Models\Tabla_usuarios;
        if ($tabla_usuarios->find($id_usuario) != null) {
            //---------------------
            //    UPDATE Usuario
            //---------------------
            if ($tabla_usuarios->update_data($id_usuario, ["estatus_usuario" => $estatus])) {
                crear_mensaje("El estatus del usuario ha sido actualizado", "¡Estatus actualizado!", TOASTR_SUCCESS);
            }//ende if
            else{
                crear_mensaje("Ocurrio un error al actualizar el estatus del usuario", "¡Error al Actualizar!", TOASTR_DANGER);
            }//end else
        }//end if
        else{
            crear_mensaje("El usuario no ha sido encontrado", "¡Oppss!", TOASTR_WARNING);
        }//end else
        return redirect()->to(route_to("administracion_usuarios"));
    }//end estatus

    public function eliminar($id_usuario = 0){
        //Instancia del modelo Usuario
        $tabla_usuarios = new \App\Models\Tabla_usuarios;
        if ($tabla_usuarios->find($id_usuario) != null) {
            if ($tabla_usuarios->delete_data($id_usuario)) {
                crear_mensaje("El usuario ha sido eliminado de manera correcta", "¡Usuario eliminado!", TOASTR_SUCCESS);
            }//end if
            else{
                crear_mensaje("Error al eliminar este usuario", "¡Error al eliminar!!", TOASTR_DANGER);
            }//end else
        }//end if
        else{
            crear_mensaje("El usuario que solicitas no se encuentra en la BD", "Oppss!", TOASTR_WARNING);
        }//end else
        return redirect()->to(route_to("administracion_usuarios"));
    }//end eliminar

}//end Home
