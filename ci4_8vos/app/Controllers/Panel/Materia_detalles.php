<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;

class Materia_detalles extends BaseController {

    private $view = 'panel/materia_detalles';
    private $session = NULL;
    private $permiso = TRUE;

    public function __construct() {
        // Obtener instancia de la variable de sesión
        $this->session = session();

        // Cargar helper de permisos
        helper("permisos_roles_helper");
        helper("html");

        // Verificar permisos de acceso
        if (!acceso_usuario(TAREA_MATERIAS, $this->session->rol_actual)) {
            $this->permiso = FALSE;
        }

        // Establecer tarea actual en la sesión
        $this->session->tarea_actual = TAREA_MATERIAS;
    }

    private function cargar_datos() {
        $datos = [];

        // Configuración básica
        $datos['nombre_pagina'] = 'Materia Detalles | CI4Base';
        $datos['titulo_pagina'] = 'Materia Detalles';

        // Información del usuario actual
        $datos["nombre_completo_usuario"] = $this->session->nombre_completo;
        $datos["nombre_usuario"] = $this->session->nombre_usuario;
        $datos["email_usuario"] = $this->session->email_usuario;
        $datos["imagen_usuario"] = ($this->session->imagen_usuario == NULL) ?
            (($this->session->sexo_usuario != MASCULINO) ? 'icon-woman.png' : 'icon-man.png') :
            $this->session->imagen_usuario;

        // Breadcrumb
        $breadcrumb = [
            [
                'href' => route_to("administracion_materias"),
                'titulo' => 'Materias',
            ],
            [
                'href' => '#',
                'titulo' => 'Detalles',
            ]
        ];

        $datos['breadcrumb_panel'] = breadcrumb_panel($datos['titulo_pagina'], $breadcrumb);

        return $datos;
    }

    private function crear_vista($nombre_vista = '', $contenido = array()){
        $contenido["menu_lateral"] = crear_menu_panel($this->session->tarea_actual, $this->session->rol_actual);
        return view($nombre_vista, $contenido);
    }//end crear_vista


    // Función Principal
    public function index($idAsignatura=0) {
        if ($this->permiso) {
            $tabla_materias = new \App\Models\Tabla_materias;
            if($tabla_materias->find($idAsignatura)==null){
                
                crear_mensaje("La materia que solicitaste no se encutra en la BD", "Oppss!", TOASTR_WARNING);
            return redirect()->to(route_to("administracion_materias"));
            }
            else{
                return $this->crear_vista($this->view,$this->cargar_datos($idAsignatura));
            }
        }

         else {
            crear_mensaje("No tienes permisos para acceder a este módulo, contacta al Administrador", "Oppss!", TOASTR_WARNING);
            return redirect()->to(route_to("administracion_acceso"));
        }
    }

    public function  actualizar($idAsignatura= 0){
        d($idAsignatura);
        $tabla_materias = new \App\Models\Tabla_materias;
        if($tabla_materias->find($idAsignatura)!= null){
            dd("Proceso de actualizacion");
            $materia=array();
            $materia["asignatura"] = $this->request->getPost("asignatura");
            $materia["acronimo"] = $this->request->getPost("acronimo");
            $materia["creditos"] = $this->request->getPost("creditos");

      
        }
        else{
            crear_mensaje("La materia que solicitaste no se encutra en la BD", "Oppss!", TOASTR_WARNING);
          return $this->index($idAsignatura);
        
         }

    }

    
}



