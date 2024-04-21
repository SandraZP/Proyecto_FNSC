<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;

class Docente_detalles extends BaseController {

    private $view = 'panel/docente_detalles';
    private $session = NULL;
    private $permiso = TRUE;

    public function __construct() {
        // Obtener instancia de la variable de sesión
        $this->session = session();

        // Cargar helper de permisos
        helper("permisos_roles_helper");
        helper("html");

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
        $datos['nombre_pagina'] = 'Docente Detalles | CI4Base';
        $datos['titulo_pagina'] = 'Docente Detalles';

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
    public function index($iddocente=0) {
        if ($this->permiso) {
            return $this->crear_vista($this->view, $this->cargar_datos());
        } else {
            crear_mensaje("No tienes permisos para acceder a este módulo, contacta al Administrador", "Oppss!", TOASTR_WARNING);
            return redirect()->to(route_to("administracion_acceso"));
        }
    }

    
}



