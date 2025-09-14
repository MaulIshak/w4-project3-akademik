<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMahasiswaMataKuliahTable extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'nim' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
            ],
            'kode_mata_kuliah' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
            ],
            'tanggal_mengambil' => [
                'type'       => 'DATE',
            ],
        ]);
        $this->forge->addKey(['nim', 'kode_mata_kuliah'], true);
        $this->forge->addForeignKey('nim', 'mahasiswa', 'nim', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kode_mata_kuliah', 'mata_kuliah', 'kode_mata_kuliah', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mahasiswa_mata_kuliah');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa_mata_kuliah');
    }
}
