<?php
    function breadcrumb_panel($breadcrumb = array(), $titulo_breadcrumb = ''){
        $html = '';
        $html.='
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">'.$titulo_breadcrumb.'</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="'.route_to("administracion_dashbord").'">Inicio</a></li>';
                    foreach ($breadcrumb as $value) {
                        if($value["href"] != '#'){
                            $html.='<li class="breadcrumb-item">
                                        <a href="'.$value['href'].'">'.$value['titulo'].'</a>
                                    </li>';
                        }//end if
                        else{
                            $html.= '<li class="breadcrumb-item active">'.$value["titulo"].'</li>';
                        }                        
                    }//end foreach
                    
                $html.='</ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        ';
        // dd($html);
        return $html;
    }//end breadcrumb_panel

    

function mostrar_mensaje($mensaje, $tipo, $nivel) {
    // Aquí va el código para mostrar el mensaje
    echo "<div class='$tipo'>$mensaje</div>";
}
