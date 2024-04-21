<?php

namespace App\Controllers;

class Home extends BaseController {

    //Función Principal
    public function index() {
        return view('welcome_message');
    }//end index

    public function practica_uno(){
        return view('practica_uno');
    }//end practica_uno

}//end Home
