<?php
    namespace App\Controllers\Usuario;
    use App\Controllers\BaseController;

    class Logout extends BaseController {

        //Función Principal
        public function index() {
            $session = session();
            // $session->close();
            $session->destroy();

            return redirect()->to(route_to("administracion_acceso"));
        }//end index

    }//end Logout
