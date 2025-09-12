<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMataKuliahTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mata_kuliah' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
                'auto_increment' => true,
            ],
            'nama_mata_kuliah' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'sks' => [
                'type'       => 'INT',
                'constraint' => 2,
            ],
        ]);

        $this->forge->addKey('id_mata_kuliah', true);
        $this->forge->createTable('mata_kuliah');
    }

    public function down()
    {
        $this->forge->dropTable('mata_kuliah');
    }
}
