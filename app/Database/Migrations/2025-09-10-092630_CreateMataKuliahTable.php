<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMataKuliahTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_mata_kuliah' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
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

        $this->forge->addKey('kode_mata_kuliah', true, true);
        $this->forge->createTable('mata_kuliah');
    }

    public function down()
    {
        $this->forge->dropTable('mata_kuliah');
    }
}
