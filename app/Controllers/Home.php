<?php

namespace App\Controllers;

use App\Models\penalModel;

class Home extends BaseController
{
    public function index()
    {
        $informe = new penalModel();
        $data = [
            'nombres' => $informe->obtenerNombres(),
            'datos' => $informe->mostrarDatos(),
            'titulo' => 'Inicio'
        ];
        return view('Pages/inicio',$data);
    }

    public function libros(){
        $Libros = new penalModel();
        $datos = [
            'libros' => $Libros->mostrarLibros(),
            'titulo' => 'Libros'
        ];
        return view('Pages/libros',$datos);
    }
}
