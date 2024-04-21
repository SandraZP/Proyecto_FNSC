<?php

namespace App\Controllers\Panel;
use App\Controllers\BaseController;

class Usuario_detalles extends BaseController {

    private $view = 'panel/usuario_detalles';

    private $session = NULL;
    private $permiso = TRUE;

    public function __construct(){
        //Intancia de la variable de sesion
        $this->session = session();

        //Instancia del permisos helper
        helper("permisos_roles_helper");
        helper("html");
        if (!acceso_usuario(TAREA_USUARIOS, $this->session->rol_actual)) {
            $this->permiso = FALSE;
        }//end 

        $this->session->tarea_actual = TAREA_USUARIOS;
    }//end __construct

    private function cargar_datos($id_usuario = 0){
        $datos = array();

        //----------
        // Configuracion Básica
        //----------
        $datos['nombre_pagina'] = 'Usuario Detalles | CI4Base';
        $datos['titulo_pagina'] = 'Usuario Detalles';
        
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
                'href' => route_to("administracion_usuarios"),
                'titulo' => 'Usuarios',
            ),
            array(
                'href' => '#',
                'titulo' => 'Detalles',
            )
        );

        $datos['breadcrumb_panel'] = breadcrumb_panel($datos['titulo_pagina'], $breadcrumb);
        //----------
        // Peticiones SQL
        //----------
        
        //Instancia del modelo Usuario
        $tabla_usuarios = new \App\Models\Tabla_usuarios;
        $datos['usuario'] = $tabla_usuarios->get_user(["id_usuario" => $id_usuario]);
        // dd($datos['usuario']);

        return $datos;
    }//en cargar_datos

    private function crear_vista($nombre_vista = '', $contenido = array()){
        $contenido["menu_lateral"] = crear_menu_panel($this->session->tarea_actual, $this->session->rol_actual);
        return view($nombre_vista, $contenido);
    }//end crear_vista

    //Función Principal
    public function index($id_usuario = 0) {
        if ($this->permiso) {
            //Instancia del modelo Usuario
            $tabla_usuarios = new \App\Models\Tabla_usuarios;
            if ($tabla_usuarios->find($id_usuario) == null) {
                crear_mensaje("El usuario que solicitas no se encuentra en la BD", "Oppss!", TOASTR_WARNING);
                return redirect()->to(route_to("administracion_usuarios"));
            }//end if
            else{
                return $this->crear_vista($this->view, $this->cargar_datos($id_usuario));
            }//end else
        }//end if
        else{
            crear_mensaje("No tienes permisos para acceder a este módulo, contancte al Administrador", "Oppss!", TOASTR_WARNING);
            return redirect()->to(route_to("administracion_acceso"));
        }//
        
    }//end index

    public function actualizar($id_usuario = 0){
        // d($id_usuario);
        //Instancia del modelo Usuario
        $tabla_usuarios = new \App\Models\Tabla_usuarios;
        if ($tabla_usuarios->find($id_usuario) != null) {
            // dd("Proceso de actualización");
            //Arreglo Temporal
            $usuario = array();
            $usuario["estatus_usuario"] = ESTATUS_HABILITADO;
            $usuario["nombre_usuario"] = $this->request->getPost("nombre");
            $usuario["ap_usuario"] = $this->request->getPost("ap_paterno");
            $usuario["am_usuario"] = $this->request->getPost("ap_materno");
            $usuario["sexo_usuario"] = $this->request->getPost("sexo");
            $usuario["email_usuario"] = $this->request->getPost("correo_electronico");
            // $usuario["imagen_usuario"] = $this->request->getPost("imagen_perfil");
            $usuario["id_rol"] = $this->request->getPost("rol");

            if(!empty($this->request->getPost("password"))) {
                if($this->request->getPost("password") == $this->request->getPost("repassword")){
                    $usuario["password_usuario"] = hash("sha256",$this->request->getPost("password"));
                }//end if
                else{
                    crear_mensaje("Las contraseñas no coinciden", "Oppss!", TOASTR_WARNING);
                    return $this->index($id_usuario);
                }//end if
            }//end if empty

            //---------------------
            //    UPDATE Usuario
            //---------------------
            if ($tabla_usuarios->update_data($id_usuario, $usuario)) {
                crear_mensaje("El usuario ha sido actualizado", "¡Actualización éxitosa!", TOASTR_SUCCESS);
                return redirect()->to(route_to("administracion_usuarios", $id_usuario));
                
            }//ende if
            else{
                crear_mensaje("Ocurrio un error al procesar la información al actualizar", "¡Error al Actualizar!", TOASTR_WARNING);
                return $this->index($id_usuario);
            }//end else

        }//end if
        else{
            crear_mensaje("El usuario que solicitas actualizar no se encuentra en la BD", "Oppss!", TOASTR_WARNING);
            return $this->index($id_usuario);
        }//end else
    }//end actualizar

}//end Home
