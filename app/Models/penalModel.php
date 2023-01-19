<?php namespace App\Models;

use CodeIgniter\Model;

class penalModel extends Model{
    public function mostrarDatos(){
        $informe = $this->db->query('SELECT Nombre, Fecha, Hora, Estado FROM penalgorriti');
        return $informe->getResult();
    }

    public function obtenerNombres(){
        $informe = $this->db->query('SELECT Nombre FROM penal.penalgorriti GROUP BY Nombre');
        return $informe->getResult();
    }
}