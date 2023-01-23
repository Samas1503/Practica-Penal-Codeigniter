<?php namespace App\Models;

use CodeIgniter\Model;

class penalModel extends Model{
    public function obtenerDatos(){
        $informe = $this->db->query('SELECT Nombre, Fecha, Hora, Tipo, Estado, Dpto FROM t_penalgorriti');
        return $informe->getResult();
    }

    public function obtenerNombres(){
        $informe = $this->db->query('SELECT Nombre FROM t_penalgorriti GROUP BY Nombre');
        return $informe->getResult();
    }

    public function obtenerDptos(){
        $informe = $this->db->query('SELECT Nombre, Dpto FROM t_penalgorriti GROUP BY Nombre, Dpto');
        return $informe->getResult();
    }
}