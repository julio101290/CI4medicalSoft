<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnForLanguaje extends Migration {

    public function up() {

        $campos = [
            'languaje' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
        ];

    
        $this->forge->addColumn('configuraciones', $campos);
    }

    public function down() {
        //cd .
    }
}
