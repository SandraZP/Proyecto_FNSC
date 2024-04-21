<?php
    namespace App\Controllers\Usuario;
    use App\Controllers\BaseController;

    class Login extends BaseController {

        //Atributo especifo
        private $view = 'usuario/login-d';

        private function cargar_datos(){
            $datos = array();
            //Información General del Sistema
            $datos['nombre_pagina'] = 'Login';
            
            return $datos;
        }//end cargar_datos

        private function crear_vista($nombre_vista = '', $contenido = array()){
            return view($nombre_vista, $contenido);
        }//end crear_vista

        //Función Principal
        public function index() {
            return $this->crear_vista($this->view, $this->cargar_datos());
        }//end index

        ////////////
        public function existe_usuario(){
            
            $email = $this->request->getPost("correo_electronico");
            $password = $this->request->getPost("password");

            //Intancia del modelo
            $tabla_usuario = new \App\Models\Tabla_usuarios;

            //Query
            $usuario = $tabla_usuario->iniciar_sesion($email, hash("sha256", $password));

            if(!empty($usuario)){

                if ($usuario->estatus_usuario == ESTATUS_DESHABILITADO) {
                    mostrar_mensaje("Este usuario ha sido deshabiltado. Comunicate con el administrador", "Error", TOASTR_WARNING);
                    return redirect()->to(route_to("administracion_acceso"));
                }//end estatus_deshabilitado
    
                //Variables de sesion
                $session = session();
                $session->set("sesion_iniciada", TRUE);
                $session->set("id_usuario", $usuario->id_usuario);
                $session->set("nombre_usuario", $usuario->nombre_usuario);
                $session->set("nombre_completo", $usuario->nombre_usuario." ".$usuario->ap_usuario." ".$usuario->am_usuario);
                $session->set("sexo_usuario", $usuario->sexo_usuario);
                $session->set("email_usuario", $usuario->email_usuario);
                $session->set("imagen_usuario", $usuario->imagen_usuario);
                $session->set("rol_actual", $usuario->id_rol);
                $session->set("tarea_actual", TAREA_DASHBOARD);
                
                crear_mensaje("Hola de nuevo ".$session->nombre_usuario." al panel de administración", "¡Bienvenido!", TOASTR_INFO);
                return redirect()->to(route_to("administracion_dashbord"));
            }//end if
            else{
                crear_mensaje("El usuario y/o contraseña son incorrectas", "Error", TOASTR_ERROR);
                return redirect()->to(route_to("administracion_acceso"));
            }//end else

        }//end existe_usuario


    }//end Login
