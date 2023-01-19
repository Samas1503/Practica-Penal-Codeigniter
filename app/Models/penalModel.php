<?php namespace App\Models;

use CodeIgniter\Model;

class penalModel extends Model{
    public function obtenerDatos(){
        $informe = $this->db->query('SELECT Nombre, Fecha, Hora, Tipo, Estado FROM penalgorriti');
        return $informe->getResult();
    }

    public function obtenerNombres(){
        $informe = $this->db->query('SELECT Nombre FROM penalgorriti GROUP BY Nombre');
        return $informe->getResult();
    }

    public function obtenerDatosNombre(){
        $informe = $this->db->query('SELECT Nombre, Fecha, Hora, Estado FROM penalgorriti WHERE Nombre LIKE "AGUILAR.Mauro"');
        return $informe->getResult();
    }
}