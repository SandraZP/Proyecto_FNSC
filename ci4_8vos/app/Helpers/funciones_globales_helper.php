<?php
    /**
     * How to declare a new function into helper
     * function nameFunction(arguments){
     *  //statement
     *  return 0;
     * }//end nameFunction
     */
    function breadcrumb_panel($titulo_pagina = '', $breadcrumb = array()){
        $html = '';
        $html.= '
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">'.$titulo_pagina.'</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="'.route_to("administracion_dashbord").'"><i class="fa fa-home" aria-hidden="true"></i></a>
                    </li>';
                    foreach ($breadcrumb as $bd) {
                        if($bd["href"] != "#"){
                            $html.= '<li class="breadcrumb-item"><a href="'.$bd["href"].'">'.$bd["titulo"].'</a></li>';
                        }//end if 
                        else{
                            $html.= '<li class="breadcrumb-item active">'.$bd["titulo"].'</li>';
                        }//end else
                    }//end foreach
                $html.='</ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        ';
        return $html;
    }//end breadcrumb_panel

    function crear_mensaje($descripcion = '', $titulo = '', $tipo_alerta = 0){
        //Sesion
        session();

        $mensaje = array(
            'descripcion' => $descripcion,
            'titulo' => $titulo,
            'tipo_alerta' => $tipo_alerta
        );

        session()->set("message", $mensaje);

    }//end crear_mensaje


    function mostrar_mensaje() {
        $html = '';

        $session = session();
        /**
         * Recuperamos la información instanciada del valor de message
         * descripcion : Hace refencia a la descipción de la alerta
         * titulo: Encabezado de la alerta - título
         * tipo alerta 1, 128, 5, -125 (success, info, error, warnign) 
         */

        $mensaje = $session->get("message");

        if ($mensaje == null) {
            return $html;
        }//end if 

        $tipo_mensaje = '';
        switch ($mensaje["tipo_alerta"]) {
            case 50:
                //Verde
                $tipo_mensaje = 'success';
                break;
                
                case 100:
                //Amarillo
                $tipo_mensaje = 'warning';
                break;
                
                case 125:
                //Rojo
                $tipo_mensaje = 'error';
                break;
                
                default:
                //Azul
                $tipo_mensaje = 'info';
                break;
            }//end switch
            
        $html = 'toastr.'.$tipo_mensaje.'("'.$mensaje["descripcion"].'", "'.$mensaje["titulo"].'");';

        session()->set("message", null);

        return $html;
    }//end mostrar_mensjae

    