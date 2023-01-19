<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categorias extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_categoria' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'descripcion' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_categoria', true);
        $this->forge->createTable('t_categorias');
    }

    public function down()
    {
        $this->forge->dropTable('t_libros');
    }
}
