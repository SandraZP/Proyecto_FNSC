<?php
    /**
     * Nos va a permitir la creación e intancia de 
     * nuestro menu panel lateral de manera dinámica
     * [menu]
     *  [Opción A]
     * 
     *  [Opción B]
     * *  [Opción B1]
     * *  [Opción B2]
     * 
     *  [Opción C]
     * *  [Opción C1]
     * *     [Opción C1.1]
     */

    function configurar_menu_panel($tarea_actual = '', $rol_actual = 0){
        //Permite almacenar todas las opciones dentro del menu
        $menu = array();
        //Permitir identificar las caracteristicas de la opcion
        $menu_opcion = array();
        //Permitir identificar las caracteristicas de la subopcion que se encuentra en la opcion principal
        $menu_sub_opcion = array();
//------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------//
        //TAREA DASHBOARD
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($tarea_actual == TAREA_DASHBOARD) ? TRUE : FALSE;
        $menu_opcion['href'] = route_to("administracion_dashbord");
        $menu_opcion['text'] = 'Dashboard';
        $menu_opcion['icon'] = 'fa fa-desktop';
            $menu_opcion['submenu'] = array();
        $menu['dashboard'] = $menu_opcion;

        if ($rol_actual == ROL_ADMINISTRADOR["clave"]) {
             //TAREA USUARIOS
            $menu_opcion = array();
            $menu_opcion['is_active'] = ($tarea_actual == TAREA_USUARIOS) ? TRUE : FALSE;
            $menu_opcion['href'] = route_to("administracion_usuarios");
            $menu_opcion['text'] = 'Usuarios';
            $menu_opcion['icon'] = 'fa fa-users';
                $menu_opcion['submenu'] = array();
            $menu['usuarios'] = $menu_opcion;
        }//TAREA_USUARIOS


//------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------//
         //TAREA DASHBOARD
         $menu_opcion = array();
         $menu_opcion['is_active'] = ($tarea_actual == TAREA_DASHBOARD) ? TRUE : FALSE;
         $menu_opcion['href'] = route_to("administracion_dashbord");
         $menu_opcion['text'] = 'Dashboard';
         $menu_opcion['icon'] = 'fa fa-desktop';
             $menu_opcion['submenu'] = array();
         $menu['dashboard'] = $menu_opcion;
 
         if ($rol_actual == ROL_ADMINISTRADOR["clave"]) {
              //TAREA MATERIAS
             $menu_opcion = array();
             $menu_opcion['is_active'] = ($tarea_actual == TAREA_MATERIAS) ? TRUE : FALSE;
             $menu_opcion['href'] = route_to("administracion_materias");
             $menu_opcion['text'] = 'Materias';
             $menu_opcion['icon'] = 'fas fa-book';
                 $menu_opcion['submenu'] = array();
             $menu['materias'] = $menu_opcion;
         }//TAREA_MATERIAS
        //------------------------------------------------------------------------------------------------------------------//
        //------------------------------------------------------------------------------------------------------------------//
        //TAREA DASHBOARD
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($tarea_actual == TAREA_DASHBOARD) ? TRUE : FALSE;
        $menu_opcion['href'] = route_to("administracion_dashbord");
        $menu_opcion['text'] = 'Dashboard';
        $menu_opcion['icon'] = 'fa fa-desktop';
            $menu_opcion['submenu'] = array();
        $menu['dashboard'] = $menu_opcion;

        if ($rol_actual == ROL_ADMINISTRADOR["clave"]) {
             //TAREA PERIODOS
            $menu_opcion = array();
            $menu_opcion['is_active'] = ($tarea_actual == TAREA_PERIODOS) ? TRUE : FALSE;
            $menu_opcion['href'] = route_to("administracion_periodos");
            $menu_opcion['text'] = 'Periodos';
            $menu_opcion['icon'] = 'fas fa-calendar-alt';
                $menu_opcion['submenu'] = array();
            $menu['periodos'] = $menu_opcion;
        }//TAREA_PERIODOS
 
         //------------------------------------------------------------------------------------------------------------------//
        //------------------------------------------------------------------------------------------------------------------//
        //TAREA DASHBOARD
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($tarea_actual == TAREA_DASHBOARD) ? TRUE : FALSE;
        $menu_opcion['href'] = route_to("administracion_dashbord");
        $menu_opcion['text'] = 'Dashboard';
        $menu_opcion['icon'] = 'fa fa-desktop';
            $menu_opcion['submenu'] = array();
        $menu['dashboard'] = $menu_opcion;

        if ($rol_actual == ROL_ADMINISTRADOR["clave"]) {
             //TAREA DOCENTES
            $menu_opcion = array();
            $menu_opcion['is_active'] = ($tarea_actual == TAREA_DOCENTES) ? TRUE : FALSE;
            $menu_opcion['href'] = route_to("administracion_docentes");
            $menu_opcion['text'] = 'Docentes';
            $menu_opcion['icon'] = 'fas fa-chalkboard-teacher';
                $menu_opcion['submenu'] = array();
            $menu['docentes'] = $menu_opcion;
        }//TAREA_DOCENTES
         //------------------------------------------------------------------------------------------------------------------//
        //------------------------------------------------------------------------------------------------------------------//
        //TAREA DASHBOARD
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($tarea_actual == TAREA_DASHBOARD) ? TRUE : FALSE;
        $menu_opcion['href'] = route_to("administracion_dashbord");
        $menu_opcion['text'] = 'Dashboard';
        $menu_opcion['icon'] = 'fa fa-desktop';
            $menu_opcion['submenu'] = array();
        $menu['dashboard'] = $menu_opcion;

        if ($rol_actual == ROL_ADMINISTRADOR["clave"]) {
             //TAREA ASIGNACION_MATERIAS
            $menu_opcion = array();
            $menu_opcion['is_active'] = ($tarea_actual == TAREA_ASIGNACION_MATERIAS) ? TRUE : FALSE;
            $menu_opcion['href'] = route_to("administracion_asignacion_materias");
            $menu_opcion['text'] = 'Asignación de Materias';
            $menu_opcion['icon'] = 'fas fa-tasks';
                $menu_opcion['submenu'] = array();
            $menu['asignación_materias'] = $menu_opcion;
        }//TAREA_ASIGNACION_MATERIAS

         //------------------------------------------------------------------------------------------------------------------//
        //------------------------------------------------------------------------------------------------------------------//
        //TAREA DASHBOARD
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($tarea_actual == TAREA_DASHBOARD) ? TRUE : FALSE;
        $menu_opcion['href'] = route_to("administracion_dashbord");
        $menu_opcion['text'] = 'Dashboard';
        $menu_opcion['icon'] = 'fa fa-desktop';
            $menu_opcion['submenu'] = array();
        $menu['dashboard'] = $menu_opcion;

        if ($rol_actual == ROL_ADMINISTRADOR["clave"]) {
             //TAREA PERIODOS
            $menu_opcion = array();
            $menu_opcion['is_active'] = ($tarea_actual == TAREA_ASIGNACION_ALUMNOS) ? TRUE : FALSE;
            $menu_opcion['href'] = route_to("administracion_asignacion_alumnos");
            $menu_opcion['text'] = 'Asignación de alumnos';
            $menu_opcion['icon'] = 'fas fa-user-graduate';
                $menu_opcion['submenu'] = array();
            $menu['asignación_alumnos'] = $menu_opcion;
        }//TAREA_ASIGNACION DE ALUMNOS



        //EJEMPLO CON OPCIONES
        $menu_opcion = array();
        $menu_opcion['is_active'] = FALSE;
        $menu_opcion['href'] = "#";
        $menu_opcion['text'] = 'Opcion B';
        $menu_opcion['icon'] = 'fa fa-battery-full';
        $menu_opcion['submenu'] = array();
        
            $menu_sub_opcion = array();
                $menu_sub_opcion['is_active'] = FALSE; 
                $menu_sub_opcion['href'] = route_to('administracion_dashbord'); 
                $menu_sub_opcion['text'] = 'Opción B1'; 
                $menu_sub_opcion['icon'] = 'fa fa-battery-three-quarters'; 
            $menu_opcion['submenu']['opcionb1'] = $menu_sub_opcion;

            $menu_sub_opcion = array();
                $menu_sub_opcion['is_active'] = FALSE; 
                $menu_sub_opcion['href'] = route_to('administracion_usuarios'); 
                $menu_sub_opcion['text'] = 'Opción B2'; 
                $menu_sub_opcion['icon'] = 'fa fa-battery-half'; 
            $menu_opcion['submenu']['opcionb2'] = $menu_sub_opcion;

        $menu['opcionB'] = $menu_opcion;

        return $menu;
    }//end configurar_menu_panel

    function crear_menu_panel($tarea_actual = '' , $rol_actual = 0 ){
        $menu = configurar_menu_panel($tarea_actual, $rol_actual);
        $html = '';
        $html.= '
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Menú Lateral</li>';
                foreach ($menu as $opcion) {
                    // dd($opcion);
                    if($opcion["href"] != "#"){
                        $html.='
                            <li class="nav-item">
                                <a href="'.$opcion["href"].'" class="nav-link '.(($opcion["is_active"] == TRUE) ? "active" : "" ).'">
                                    <i class="'.$opcion["icon"].' nav-icon"></i>
                                    <p>'.$opcion["text"].'</p>
                                </a>
                            </li>
                        ';
                    }//end if 
                    else{
                        $html.= '
                            <li class="nav-item '.(($opcion["is_active"] == TRUE) ? "menu-open" : "" ).'">
                                <a href="#" class="nav-link '.(($opcion["is_active"] == TRUE) ? "active" : "" ).'">
                                    <i class="nav-icon '.$opcion["icon"].'"></i>
                                    <p>
                                        '.$opcion["text"].'
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>';
                                if(sizeof($opcion["submenu"]) > 0){
                                    $html.='<ul class="nav nav-treeview">';
                                    foreach ($opcion["submenu"] as $sub_opcion_menu) {
                                        $html.='
                                            <li class="nav-item">
                                                <a href="#" class="nav-link '.(($sub_opcion_menu["is_active"] == TRUE) ? "active" : "" ).'">
                                                    <i class="'.$sub_opcion_menu["icon"].' nav-icon"></i>
                                                    <p>'.$sub_opcion_menu["text"].'</p>
                                                </a>
                                            </li>
                                        ';
                                    }//end foreach subopcion
                                    $html.='</ul>';
                                }//end if sizeof
                            $html.'</li>
                        ';
                    }//end 
                }
        $html.='</ul>';
        return $html;
    }//end crear_menu_panel