<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;

class Docente_nuevo extends BaseController {

    private $view = 'panel/docente_nuevo';
    private $session = NULL;
    private $permiso = TRUE;

    public function __construct() {
        // Obtener instancia de la variable de sesión
        $this->session = session();

        // Cargar helper de permisos
        helper(["permisos_roles_helper", "html"]);

        // Verificar permisos de acceso
        if (!acceso_usuario(TAREA_DOCENTES, $this->session->rol_actual)) {
            $this->permiso = FALSE;
        }

        // Establecer tarea actual en la sesión
        $this->session->tarea_actual = TAREA_DOCENTES;
    }

    private function cargar_datos() {
        $datos = [];

        // Configuración básica
        $datos['nombre_pagina'] = 'Docente Nuevo | CI4Base';
        $datos['titulo_pagina'] = 'Docente Nuevo';

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
                'href' => route_to("administracion_docentes"),
                'titulo' => 'Docentes',
            ],
            [
                'href' => '#',
                'titulo' => 'Nuevo',
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
    public function index() {
        if ($this->permiso) {
            return $this->crear_vista($this->view, $this->cargar_datos());
        } else {
            crear_mensaje("No tienes permisos para acceder a este módulo, contacta al Administrador", "Oppss!", TOASTR_WARNING);
            return redirect()->to(route_to("administracion_acceso"));
        }
    }

    public function  registrar(){
        d('Registrando....');

        //Arreglo Temporal
        $docente = array();
        // $materia["attributoDB"] = $this->request->getPost("nameFileHTML");
       $docente["numero_empleado"] = $this->request->getPost("numero_empleado");
        $docente["grado_estudios"] = $this->request->getPost("grado_estudios");
        $docente["id_usuario"] = $this->request->getPost("id_usuario");
        $docente["idpe"] = $this->request->getPost("idpe");

        // dd($materia);

        $tabla_docentes = new \App\Models\Tabla_docentes;


        if($tabla_docentes->create_data($docente) > 0){
            crear_mensaje("La materia ha sido registrado de manera éxitosa", "¡Petición éxitosa!", TOASTR_SUCCESS);
            return redirect()->to(route_to("administracion_docentes"));
        }//end
        else{
            crear_mensaje("Hubo un error al registrar la materia", "¡Error Interno!", TOASTR_DANGER);
            return $this->index(); 
        }//end 

    }
}



