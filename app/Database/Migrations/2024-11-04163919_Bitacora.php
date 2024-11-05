<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bitacora extends Migration {

    public function up() {
        // Bitacora
        $this->forge->addField([
                'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'descripcion' => ['type' => 'text',  'null'  => true],
                'usuario'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'created_at'  => ['type' => 'datetime', 'null'  => true],
                'updated_at'  => ['type' => 'datetime', 'null'  => true],
                'deleted_at'  => ['type' => 'datetime', 'null'  => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bitacora', true);
    }

    public function down() {
        $this->forge->dropTable('bitacora', true);
    }
}
