<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LibrosSeeder extends Seeder
{
    public function run()
    {
        // $this->db->table('t_libros')->where('id_libro >', 0)->delete();
        $this->db->table('t_libros')->truncate();

        for ($i = 1; $i < 51; $i++) {
            $data = [
                'nombre' => 'libro '.$i,
                'descripcion' => 'descripcion de libro '.$i,
            ];
            
            // Using Query Builder
            $this->db->table('t_libros')->insert($data);
        }

        // Simple Queries
        // $this->db->query('INSERT INTO t_libros (nombre, descripcion) VALUES(:username:, :email:)', $data);

    }
}